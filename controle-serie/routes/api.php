<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SeriesController;
use App\Http\Controllers\Api\TemporadasController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('/series', SeriesController::class);
// Route::get('/series', [SeriesController::class, 'index']);
// Route::post('/series', [SeriesController::class, 'store']);
// Route::get('/series/{id}', [SeriesController::class, 'showId']);

Route::get('/series/{series}/season', [TemporadasController::class, 'index']);