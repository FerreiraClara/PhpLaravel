<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use App\Models\Season;
use App\Http\Requests\SeriesFormRequest;
// use App\Repositories\SeriesRepository;
// use App\Repositories\EloquentSeriesRepository;

class SeriesController extends Controller
{
    // public function __construct(private SeriesRepository $seriesRepository)
    // {

    // }

    public function index()
    {

        $series = Serie::all();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }


    public function store(SeriesFormRequest $request)
    {
        //informando ao usuário que foi criado e retornando-a
        return response() 
            ->json(Serie::create($request->all()), 201);
            // criando uma response (resposta) do tipo json, passando a requisicao e o tipo do erro 201 (criado);
    }

    // public function showId(Serie $id){
    public function showId($id){
        //poderia usar o find também
        return Serie::where('id', $id)->get() . Season::where('series_id', $id)->get();
        
    }
}
