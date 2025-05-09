<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AutenticacaoController extends Controller
{

    public function index(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // dd($credentials);

        // nao funciona porque Hash:make cria um novo hash e não é isso que deve ser feito, mas sim verificar
        // $user = User::where('email', $credentials['email'])->where('password', Hash::make($credentials['password']))->first();

        $user = User::where('email', $credentials['email'])->first();
        if ($user === null || Hash::check($credentials['password'], $user['password']) === false)
        {
            return response()->json('Unauthorized', 401);
        };    
        return response()->json('Sucesso', 200);
        // dd($user);
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
