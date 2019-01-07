<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasRole("administrador");
       // return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'usu_nombre'=>'required_without:usu_id|string|min:3|max:50',
            'usu_email' => 'required_without:usu_id|string|email|min:10|max:50|',
            'idRol'=>'required|integer|exists:roles,id',

        
        ];
    }
    public function messages()
    {
        return [
           
            'usu_email.unique' => 'El e-mail ya ha sido ingresado',
        ];
    }

}
