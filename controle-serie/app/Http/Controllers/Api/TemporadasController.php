<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\Season;

class TemporadasController extends Controller
{
    public function index(Serie $series)
    {
        return $series->seasons;
    }
}
