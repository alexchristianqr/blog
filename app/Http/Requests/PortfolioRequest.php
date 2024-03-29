<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
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
        $rules = [];
        switch($this->method()){
            case 'POST':
                $rules = [
                    'name' => 'required',
                    'kind' => 'required',
                    'description' => 'required',
                ];
                break;
            case 'PUT':
                $rules = [
                    'name' => 'required',
                    'kind' => 'required',
                    'description' => 'required',
                ];
                break;
        }
        return $rules;
    }
}
