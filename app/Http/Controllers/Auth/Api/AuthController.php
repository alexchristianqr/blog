<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Services\AuthService;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
   /**
    * Create a new AuthController instance.
    * @return void
    */
   public function __construct()
   {
//      $this->middleware('cors:api', ['except' => ['login']]);
      $this->middleware(['verify.authorization', 'jwt.auth'], ['except' => ['login']]);
   }

   /**
    * Get a JWT via given credentials.
    * @param Request $request
    * @return \Illuminate\Http\JsonResponse
    */
   public function login(Request $request)
   {
      try{
         list($token, $session) = (new AuthService())->login($request);
         return $this->respondWithToken($token, $session);
      }catch(Exception $e){
         return response()->json($e->getMessage(), $e->getCode());
      }
   }

   /**
    * Get the authenticated User.
    * @return \Illuminate\Http\JsonResponse
    */
   public function me()
   {
      try{
         $dataAuth = auth()->user();
         return response()->json($dataAuth, OK);
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
         'auth' => JWTAuth::user(),
         'access_token' => $token,
         'token_type' => 'bearer',
         'expires_in' => JWTAuth::factory()->getTTL() * 60
      ]);
   }
}
