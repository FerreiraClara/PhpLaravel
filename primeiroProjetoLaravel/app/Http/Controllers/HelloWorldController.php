<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function helloWorld()
    {
        view('helloController');
    }

    public function hello($name)
    {
        return 'Hello, ' . $name;
    }
}
