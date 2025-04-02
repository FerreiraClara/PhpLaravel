<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\SeriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/api/series', [SeriesController::class, 'index']);
Route::get('/api/series/{id}', [SeriesController::class, 'showId']);

Route::post('/api/seriespost', [SeriesController::class, 'store']);