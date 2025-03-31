<?php

namespace App\Http\Controllers\Api;

use App\Models\Serie;

class SeriesController extends Controller
{
    public function index()
    {
        return Serie::all();
    }
}
