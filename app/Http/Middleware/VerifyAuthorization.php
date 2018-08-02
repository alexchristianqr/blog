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
        $response = null;
        if($request->ajax()){
            if($request->hasHeader("Authorization")){
                try{
                    $arr_token = explode(' ',$request->header("Authorization"));
                    $request->request->add(['token' => $arr_token[1]]);
                    $response = $next($request);
                }catch(\Exception $e){
                    return  response()->json("User Unhautorized", 401);
                }
            }else{
                $response = response()->json("User Unhautorized", 401);
            }
            return $response;
        }else{
            return abort(404);
        }
    }
}
