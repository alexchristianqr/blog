<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
   /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
   public function authorize()
   {
      return true;
   }

   /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
   public function rules()
   {
      return [
         'fullname' => 'required|max:100',
         'email' => 'required|email',
         'password' => 'required|string|min:8|max:16|confirmed',
         'password_confirmation' => 'required',
      ];
   }

   public function messages()
   {
      return [
         'fullname.required' => 'El campo <b>Nombre</b> es necesario',
         'fullname.max' => 'El campo <b>Nombre</b> debe tener un max:100 caracteres',
         'email.required' => 'El campo <b>Email</b> es necesario',
         'email.email' => 'El campo <b>Email</b> debe ser un email válido',
         'password.required' => 'El campo <b>Contraseña</b> es necesario',
         'password_confirmation.required' => 'El campo <b>Confirmar Contraseña</b> es necesario',
         'password.confirmed' => 'El campo <b>Contraseña</b> no ha sido confirmado',
         'password.min' =>  'El campo <b>Contraseña</b> debe tener un min:8 y max:16 caractéres',
         'password.max' =>  'El campo <b>Contraseña</b> debe tener un min:8 y max:16 caractéres',
      ];
   }
}
