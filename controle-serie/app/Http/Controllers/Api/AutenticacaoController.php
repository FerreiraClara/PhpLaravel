<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AutenticacaoController extends Controller
{

    public function index(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();
        
        if (Auth::attempt($credentials) === false)
        {
            return response()->json('Unauthorized', 401);
        }
        //pegando os dados do usuario
        $user = Auth::user();

        //remove todos os tokens que o usuario possa ter, antes de criar um novo, para caso alguma autorizacao seja tirada/adicionada
        $user->tokens()->delete();

        
        //$user->nivelAcesso == 'admin', por exemplo
        if ($user->admin)
        {
            // se caso o usuario for admin, posso adicionar uma habilidade a mais no token, no caso, deletar / array de habilidades
            // nao precisa ser 'series:deletar', mas é bom manter um padrao de 'recurso:operacao'
            $token = $user->createToken('token', ['is_admin']);
        };
        
        //createToken('dar_um_nome_para_o_token')
        // $token = $user->createToken('token');

        return response()->json($token->plainTextToken . ' Sucesso', 200);
        
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
