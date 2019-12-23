<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
         'fullname' => 'required|regex:/^[a-zA-Z]+$/u|max:50',
         'email' => 'required|email',
         'phone' => 'required|numeric|digits_between:7,16',
         'message' => 'required|max:300|alpha',
      ];
   }

   public function messages()
   {
      return [
         'fullname.required' => 'El campo <b>Nombre</b> es necesario',
         'fullname.regex' => 'El campo <b>Nombre</b> debe contener solo letras',
         'fullname.max' => 'El campo <b>Nombre</b> debe tener un maximo de 50 caracteres',
         'email.required' => 'El campo <b>Email</b> es necesario',
         'email.email' => 'El campo <b>Email</b> debe ser un email válido',
         'phone.required' =>  'El campo <b>Telefono</b> es necesario',
         'phone.numeric' =>  'El campo <b>Telefono</b> debe ser numerico',
         'phone.digits_between' =>  'El campo <b>Telefono</b> debe ser un número de telefono válido',
         'message.required' =>  'El campo <b>Mensaje</b> es necesario',
         'message.max' =>  'El campo <b>Mensaje</b> debe tener un maximo de 300 caracteres',
         'message.alpha' =>  'El campo <b>Mensaje</b> debe contener solo letras',
      ];
   }
}
