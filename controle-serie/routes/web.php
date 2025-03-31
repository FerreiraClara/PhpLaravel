<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\SeriesController;
use App\Models\Serie;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/series', [\App\Http\Controllers\Api\SeriesController::class, 'index']);