<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/property', function () {
    return view('property');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/agents-grid', function () {
    return view('agents-grid');
});

Route::get('/agent-single', function () {
    return view('agent-single');
});

Route::get('/blog-single', function () {
    return view('blog-single');
});

Route::get('/property-single', function () {
    return view('property-single');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
