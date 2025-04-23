<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.componentes-pages.home');
});

Route::get('/about', function () {
    return view('layouts.componentes-pages.about');
});

Route::get('/property', function () {
    return view('layouts.componentes-pages.property');
});

Route::get('/blog', function () {
    return view('layouts.componentes-pages.blog');
});

Route::get('/agents-grid', function () {
    return view('layouts.componentes-pages.agents-grid');
});

Route::get('/agent-single', function () {
    return view('layouts.componentes-pages.agent-single');
});

Route::get('/blog-single', function () {
    return view('layouts.componentes-pages.blog-single');
});

Route::get('/property-single', function () {
    return view('layouts.componentes-pages.property-single');
});

Route::get('/contact', function () {
    return view('layouts.componentes-pages.contact');
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
