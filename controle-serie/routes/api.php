<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SeriesController;
use App\Http\Controllers\Api\TemporadasController;
use App\Http\Controllers\Api\EpisodiosController;
use App\Http\Controllers\Api\AutenticacaoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//o middleware auth:sanctum já pega o token do usuário, encontra o usuario a partir do token e consegue acessar as outras urls
Route::middleware('auth:sanctum')->group(function() {
    
    Route::apiResource('/series', SeriesController::class);

    Route::get('/series/{series}/season', [TemporadasController::class, 'index']);
    
    Route::get('/series/{series}/episodes', [EpisodiosController::class, 'index']);
    
    Route::patch('/episodes/{episode}', [EpisodiosController::class, 'assistido']);
});

Route::post('/login', [AutenticacaoController::class, 'index']);