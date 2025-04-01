<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller
{
    public function index()
    {
        return Serie::all();
    }

    public function store(SeriesFormRequest $request)
    {
        // verificando se os dados estão sendo recebidos com sucesso
        $serie = Serie::create($request->all());

        //informando ao usuário que foi criado e retornando-a
        return response() 
            ->json($serie, 201);
    }
}
