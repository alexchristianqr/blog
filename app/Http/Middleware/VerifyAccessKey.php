<?php

namespace App\Http\Middleware;

use Closure;

class VerifyAccessKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        return $next($request);
      $response = null;
      if ($request->ajax()) {
        if ($request->hasHeader("Api-Key")) {
          if ($request->header("Api-Key") == config()["app"]["apikey"]) {
            $response = $next($request);
          }else{
            $response = response()->json("User Unhautorized", 401);
          }
        } else {
          $response = response()->json("User Unhautorized", 401);
        }
        return $response;
      } else {
        return abort(404);
      }
    }
}
