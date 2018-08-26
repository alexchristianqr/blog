<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('cors:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $token = auth()->attempt($credentials);
        if(!$token){
            return response()->json('Unauthorized', 401);
        }
        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        try{
            $dataAuth=auth()->user();
//            dd(auth());
//            $dataAuth->token = auth()->token;

            return response()->json($dataAuth,OK);
        }catch(TokenExpiredException $e){
            return response()->json($e->getMessage(), UNAUTHORIZED);
        }
    }

    /**
     * Log the user out (Invalidate the token).
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        try{
            auth()->logout();
            return response()->json('Successfully logged out', 200);
        }catch(TokenExpiredException $e){
            echo $e->getMessage() . "\n";
            $newToken = auth()->refresh();
            request()->request->set('token', $newToken);
            return $this->logout();
        }
    }

    /**
     * Refresh a token.
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     * @param  string $token
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'auth' => (object)auth()->user(),
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
