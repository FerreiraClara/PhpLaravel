<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use App\Http\Requests\SeriesFormRequest;
use App\Repositories\SeriesRepository;
use App\Repositories\EloquentSeriesRepository;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository)
    {

    }

    public function index()
    {
        return Serie::all();
    }

    public function store(SeriesFormRequest $request)
    {
        //informando ao usuário que foi criado e retornando-a
        return response() 
            ->json($this->seriesRepository->add($request), 201);
    }
}
