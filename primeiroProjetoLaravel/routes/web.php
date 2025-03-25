<?php

use Illuminate\Support\Facades\Route;

// Verbos HTTP: GET, POST, PUT, PATCH, DELETE e OPTIONS
// a funcao das rotas é anonima

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello-world', function(){
    return 'Hello World';
});

Route::get('/hello-world-erro', function(){
    return view('Hello World');
});



//Parametro dinamico
// ? indica que o parametro nao e obrigatorio evitando erro, mas DEVE ser definido valor padrao na variavel
Route::get('/hello/{name?}', function($name = null){
    return 'Hello, ' . $name;
});



//Rotas envolvendo controllers
Route::get('/hello-world', [\App\Http\Controllers\HelloWorldController::class, 'helloWorld']);

Route::get('/hello/{name?}', [\App\Http\Controllers\HelloWorldController::class, 'hello']);


Route::get('/queries', function(/*$tmpId*/){
    $events = \App\Models\Event::all();                             // select * from events
    // $events = \App\Models\Event::all('title', 'description');    // select title, description from events
    // $events = \App\Models\Event::where('id', 1)->get();           // select * from events where id = 1
    // $events = \App\Models\Event::where('id', 1)->first();         // select * from events where id = 1
    // $events = \App\Models\Event::find($tmpId);                    // select * from events where id = (variavel)

    return $events;
});