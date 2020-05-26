<?php

namespace App\Http\Middleware;

use Closure;

class VerifyAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
       $response = $next($request);
       if($request->ajax() || $request->method() === 'OPTIONS'){
          if($request->hasHeader('Authorization')){
             $arr_token = explode(' ', $request->header('Authorization'));
             $request->request->add(['token' => $arr_token[1]]);
             $response->headers->set('Access-Control-Allow-Origin', '*');
             $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, DELETE, OPTIONS');
             $response->headers->set('Access-Control-Allow-Headers', 'Origin, Content-Type, Accept, X-Requested-With, Authorization, Current-Session, Application');
             return $response;
          }else{
             return response()->json('User unauthorized', 401);
          }
       }else{
          return abort(404);
       }
    }
}
