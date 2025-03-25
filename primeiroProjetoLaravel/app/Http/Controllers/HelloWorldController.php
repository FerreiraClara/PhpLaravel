<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function helloWorld()
    {
        return view('helloController');
    }

    public function hello($name = null)
    {
        return 'Hello - Controller, ' . $name;
    }
}
