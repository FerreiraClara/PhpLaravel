<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

    public function index(Request $request)
    {

        $query = Serie::query();

        //verificando se foi passado uma chave nome
        if ($request->has('nome'))
        {
            $query->where('nome', $request->nome)->get();

        }
        
        //paginate(perPage: int, columns: array, pageName: string = 'page', page: int)
        return $query->paginate(5);

        // $mensagemSucesso = session('mensagem.sucesso');
        // return view('series.index')->with('series', $series)
        //     ->with('mensagemSucesso', $mensagemSucesso);
    }


    public function store(SeriesFormRequest $request)
    {
        //informando ao usuário que foi criado e retornando-a
        return response() 
            // criando uma response (resposta) do tipo json, passando a requisicao e o tipo do erro 201 (criado);
            // ->json(Serie::create($request->all()), 201);
            ->json($this->seriesRepository->add($request), 201);
    }

    public function show($seriesId){
        $series = Serie::with('seasons.episodes')->find($seriesId);
        
        if ($series === null) {
            return response()->json(['message' => 'Serie nao encontrada'], 404);
        }

        return $series;
        
    }

    // o método update espera receber o id da serie na url e espera o corpo da requisicao
    public function update(SeriesFormRequest $request, Serie $series){
        // fill preenche um modelo existente com os dados da requisição
        $series->fill($request->all());
        $series->save();

        return $series;
    }

    public function destroy($serieId)
    {
        Serie::destroy($serieId);

        // return response('', 204); é a mesma coisa que response()->noContent();
        return response()->noContent();
    }

    // Para o destroy, no postman, preciso definir no Headers a key == Accept e value == application/json
}
