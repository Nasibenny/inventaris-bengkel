<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * URI yang tidak memerlukan proteksi CSRF.
     */
    protected $except = [
        //
    ];
}
