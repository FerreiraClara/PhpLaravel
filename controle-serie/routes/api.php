<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SeriesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/series/{id}', [SeriesController::class, 'showId']);


Route::apiResource('/series', SeriesController::class);
// Route::get('/series', [SeriesController::class, 'index']);
// Route::post('/series', [SeriesController::class, 'store']);