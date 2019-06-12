<?php
/**
 * Created by Alex Christian.
 * Github: https://github.com/acqrdeveloper
 */

namespace App\Http\Services;

use App\User;
use Carbon\Carbon;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService
{

   //Validar la sesion actual del usuario
   function validateCurrentUserSession($request)
   {
      $user = User::where('email', $request->request->get('email'))->orWhere('username', $request->request->get('email'))->first();
      //Si el usuario no existe en la BD
      throw_if(is_null($user), new Exception('El usuario no esta registrado', 401));
      if($user->status === 'I'){//Si el usuario esta con estado "INACTIVO"
         throw new Exception('El usuario no esta activo', 401);
      }elseif($user->status === 'A'){//Si el usuario esta con estado "ACTIVO"
         if($request->request->has('single')){//Si el $request consulta despues de estar autenticado
            //Excepcion si el usuario tiene una session activa en otra computadora
            throw_if($user->token === null, new Exception('Existe una sesion activa', 401));
            return true;
         }else{//Si el $request consulta antes de estar autenticado
            //Excepcion si el usuario tiene una session activa en otra computadora
            throw_if($user->token !== null, new Exception('Existe una sesion activa', 401));
            return true;
         }
      }else{
         throw new Exception('Error en request');
      }
   }

   //Validar si las credenciales sera por email o username
   function isEmailOrUsername($request)
   {
      if(strpos($request->get('email'), '@') !== false){
         return [
            'email' => $request->get('email'),
            'password' => $request->get('password')
         ];
      }else{
         return [
            'username' => $request->get('email'),
            'password' => $request->get('password')
         ];
      }
   }

   //Iniciar Sesion con JWT
   function login($request)
   {
      //Validar la sesion del usuario a autenticarse
      (new AuthService())->validateCurrentUserSession($request);
      //Obtener token de seguridad
      $token = JWTAuth::attempt($this->isEmailOrUsername($request));
      throw_if(!$token, new Exception('El usuario o contraseña no son correctos', 401));
      $session = session()->getId();
      User::where('id', auth()->user()->id)->update([
         'token' => $token,
         'session_id' => $session,
         'date_session_start' => Carbon::now(),
         'time_session_expired' => (60 * 60),
         'date_session_end' => null,
      ]);
      return [$token, $session];
   }

   function getUserById($request)
   {
      return User::where('id', $request->user_id)->first();
   }

   function verifyRole($request)
   {
      return User::whereExists(function($query) use ($request){
         $query->where('id', $request->user_id);
      })->first(['role_id'])->role_id;
   }

   /**
    * @param $request
    * @return bool: True (1) or False (0)
    */
   function getStatusSession($request)
   {
      return (bool)User::whereExists(
         function($query) use ($request){
            $query->where('id', $request->user_id);
            $query->where('remember_token', null);
         })->first();
   }

   /**
    * @param $request
    * @return mixed: Activo (A) o Inactivo (I)
    */
   function getStatusUser($request)
   {
      return User::where('id', $request->user_id)->first(['status'])->status;
   }
}