<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use App\User;
class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       // return Auth::user()->hasRole("administrador");
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        switch($this->method())
        {
            case 'PATCH':
            $usuario = User::find($this->usu_id);
            return [
                'usu_nombre'=>'required|min:3|max:50',
                'usu_apellido'=>'required|min:3|max:50',
                'usu_cedula'=>'required|digits:10|unique:inv_usuarios,usu_cedula,'.$usuario->usu_id.',usu_id',
                'usu_email' => 'required|max:50|email',
                'idRol'=>'required|integer|exists:roles,id',
                'usu_fechaN'=>'required|date',
                'usu_direccion'=>'max:100',
                'usu_telefono'=>'nullable|digits:9',
                'usu_celular'=>'required|digits:10',
                'usu_foto'=>'nullable|file|mimes:jpeg,png,jpg,JPG|dimensions:min_width=400,min_height=400,max_width=2000,max_height=2000|max:2048',
            ];               
               
               
                
                break; 
            case 'PUT': //update
                break; 
            case 'POST': //store
            return [
                'usu_nombre'=>'required|min:3|max:50',
                'usu_apellido'=>'required|min:3|max:50',
                'usu_cedula'=>'required|digits:10|unique:inv_usuarios,usu_cedula',
                'usu_email' => 'required|max:50|email',
                'idRol'=>'required|integer|exists:roles,id',
                'usu_fechaN'=>'required|date',
                'usu_direccion'=>'max:100',
                'usu_telefono'=>'nullable|digits:9',
                'usu_celular'=>'required|digits:10',
                'usu_foto'=>'nullable|file|mimes:jpeg,png,jpg,JPG|dimensions:min_width=400,min_height=400,max_width=2000,max_height=2000|max:2048',
            ];    
               
                
                break; 
            default:
                break;
        }        
    }
    public function messages()
    {
        return [
            'usu_nombre.required' => 'El campo Nombre no debe estar vacío',
            'usu_apellido.required' => 'El campo Apellido no debe estar vacío',
            'usu_cedula.required' => 'El campo Cédula no debe estar vacío',
            'usu_cedula.digits' => 'Formato de Cédula incorrecto',
            'usu_cedula.unique' => 'La cédula ya ha sido ingresada',
            'usu_email.required' => 'El campo e-mail no debe estar vacío',
            'usu_email.email' => 'Formato de correo electrónico incorrecto',
            'idRol.required' => 'Debe seleccionar un Rol',
            'usu_fechaN.required' => 'El campo Fecha no debe estar vacío',
            'usu_fechaN.email' => 'Formato de Fecha incorrecto',
            'usu_telefono.digits' => 'Teléfono incorrecto',
            'usu_celular.required' => 'El campo Celular no debe estar vacío',
            'usu_celular.digits' => 'Celular incorrecto',
        ];
    }

}
