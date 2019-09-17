<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
         'email' => 'required|email',
         'password' => 'required|string|min:8|max:16'
      ];
   }

   public function messages()
   {
      return [
         'email.required' => 'El campo <b>Email</b> es necesario',
         'email.email' => 'El campo <b>Email</b> debe ser un email válido',
         'password.required' => 'El campo <b>Contraseña</b> es necesario',
         'password.min' =>  'El campo <b>Contraseña</b> debe tener un min:8 y max:16 cracteres',
         'password.max' =>  'El campo <b>Contraseña</b> debe tener un min:8 y max:16 cracteres',
      ];
   }
}
