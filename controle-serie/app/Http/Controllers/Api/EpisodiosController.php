<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\Season;
use App\Models\Episode;

class EpisodiosController extends Controller
{
    public function index(Serie $series)
    {
        return $series->episodes;
    }

    public function assistido(Episode $episode, Request $request)
    {
        $episode->watched = $request->watched;
        $episode->save();

        return $episode;
    }
}
