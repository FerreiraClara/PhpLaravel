<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use App\Models\Season;
use App\Http\Requests\SeriesFormRequest;
use App\Repositories\SeriesRepository;
// use App\Repositories\EloquentSeriesRepository;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository)
    {

    }

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
            // criando uma response (resposta) do tipo json, passando a requisicao e o tipo do erro 201 (criado);
            // ->json(Serie::create($request->all()), 201);
            ->json($this->seriesRepository->add($request), 201);
    }

    public function show($series){
        $series = Serie::where('id', $series)->with('seasons.episodes')->get();
        return $series;
        
    }
}
