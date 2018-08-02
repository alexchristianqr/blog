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
        if(config('app')['env'] === 'local'){
            return $next($request)
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, DELETE, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Accept, X-Requested-With, Authorization, Type-Project');
        }else{
            if($request->ajax() || $request->method() === 'OPTIONS'){
                return $next($request)
                    ->header('Access-Control-Allow-Origin', '*')
                    ->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, DELETE, OPTIONS')
                    ->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Accept, X-Requested-With, Authorization, Type-Project');
            }else if(!$request->ajax()){
                return $next($request);
            }else{
                return abort(404);
            }
        }
    }

}
