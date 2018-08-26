<?php

namespace App\Http\Controllers\Auth\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class AuthController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('cors:web', ['except' => ['login']]);
//    }
    /**
     * Get a JWT via given credentials.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validate($request, ['email' => 'required|string|email', 'password' => 'required|string|min:8']);
        $credentials = $request->only(['email', 'password']);
        $token = auth()->attempt($credentials);
        if(!$token){
            throw ValidationException::withMessages(['email' => [trans('auth.failed')],]);
        }
        return $this->respondWithToken($token);
    }

    /**
     * Log the user out (Invalidate the token).
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        try{
            request()->request->set('token', session()->get('dataToken'));
            auth()->logout();
            session()->remove('dataAuth');
            session()->remove('dataToken');
            return redirect()->intended('/');
        }catch(JWTException $e){
            echo $e->getMessage() . "\n";
            return redirect()->intended('/');
        }catch(TokenExpiredException $e){
            echo $e->getMessage() . "\n";
            $newToken = auth()->refresh();
            request()->request->set('token', $newToken);
            return $this->logout();
        }
    }

    /**
     * Get the token array structure.
     * @param  string $token
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        session(['dataAuth' => (object)auth()->user()]);
        session(['dataToken' => $token]);
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ], 200);
    }
}