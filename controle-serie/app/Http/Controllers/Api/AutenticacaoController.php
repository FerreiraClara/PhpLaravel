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

        //createToken('dar_um_nome_para_o_token')
        $token = $user->createToken('token');

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
