<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Serie;

class SeriesController extends Controller
{
    public function index()
    {
        return Serie::all();
    }
}
