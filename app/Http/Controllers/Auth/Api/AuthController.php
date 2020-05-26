<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\AuthService;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
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
      $id = auth()->user()->id;
      try{
         $dataAuth = auth()->user();
         return response()->json($dataAuth, OK);
      } catch(UnauthorizedHttpException $e){
         User::where('id', $id)->update(['token' => null, 'session_id' => null]);
         return response()->json($e->getMessage(), UNAUTHORIZED);
      }catch(TokenExpiredException $e){
         User::where('id', $id)->update(['token' => null, 'session_id' => null]);
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
         User::where('id', auth()->user()->id)->update(['token' => null, 'session_id' => null]);
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
    * @param null $session
    * @return \Illuminate\Http\JsonResponse
    */
   protected function respondWithToken($token, $session = null)
   {
      return response()->json([
         'auth' => JWTAuth::user(),
         'session' => $session,
         'access_token' => $token,
         'token_type' => 'bearer',
         'expires_in' => JWTAuth::factory()->getTTL() * 60
      ]);
   }
}
