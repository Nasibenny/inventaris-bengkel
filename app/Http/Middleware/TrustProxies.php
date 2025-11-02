<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Symfony\Component\HttpFoundation\Request;

class TrustProxies extends Middleware
{
    /**
     * Proxy yang dipercaya.
     *
     * Jika server kamu tidak memakai proxy atau load balancer, biarkan null.
     */
    protected $proxies = null;

    /**
     * Header yang digunakan untuk menentukan IP asli client.
     */
    protected $headers = Request::HEADER_X_FORWARDED_FOR | 
                         Request::HEADER_X_FORWARDED_HOST | 
                         Request::HEADER_X_FORWARDED_PORT | 
                         Request::HEADER_X_FORWARDED_PROTO;
}
