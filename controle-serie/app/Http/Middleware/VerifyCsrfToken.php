<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\Concerns\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $except = [
        '/api/seriespost',
    ];
}