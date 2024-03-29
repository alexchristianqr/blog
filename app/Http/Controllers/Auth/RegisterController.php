<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Exception;

class RegisterController extends Controller
{
   /*
   |--------------------------------------------------------------------------
   | Register Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles the registration of new users as well as their
   | validation and creation. By default this controller uses a trait to
   | provide this functionality without requiring any additional code.
   |
   */

   use RegistersUsers;

   /**
    * Where to redirect users after registration.
    *
    * @var string
    */
   protected $redirectTo = '/';

   /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
      $this->middleware('guest');
   }

   /**
    * Get a validator for an incoming registration request.
    *
    * @param  array $data
    * @return \Illuminate\Contracts\Validation\Validator
    */
   protected function validator(array $data)
   {
      return Validator::make($data, [
         'name' => 'required|string|max:255',
         'email' => 'required|string|email|max:255|unique:users',
         'password' => 'required|string|min:6|confirmed',
         'confirm_password' => 'required|string|min:6|confirmed',
      ]);
   }

   /**
    * Create a new user instance after a valid registration.
    *
    * @param Request $request
    * @return \App\User
    */
   protected function postRegister(RegisterRequest $request)
   {
      try{
         User::create([
            'name' => $request->request->get('fullname'),
            'role_id' => 2,
            'username' => strtolower($request->request->get('fullname')),
            'email' => $request->request->get('email'),
            'pwd_decrypted' => $request->request->get('password'),
            'password' => Hash::make($request->request->get('password')),
         ]);
         return redirect()->route('get.login')->withInput(['email' => $request->request->get('email')])->with(['message_success' => 'User created successfully']);
      }catch(Exception $e){
         return redirect()->back()->withInput($request->request->all())->withErrors(['message_failed' => ['Failed in moment of create user']]);
      }
   }

   public function getRegister()
   {
      return view('pages.auth.register');
   }
}