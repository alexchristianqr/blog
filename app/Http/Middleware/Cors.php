<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * [Dev: Funcion que valida el acceso por una cabecera válida]
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       $response = $next($request);
       $response->headers->set('Access-Control-Allow-Origin', '*');
       $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, DELETE, OPTIONS');
       $response->headers->set('Access-Control-Allow-Headers', 'Origin, Content-Type, Accept, X-Requested-With, Authorization, Application');
       return $response;
    }

}
