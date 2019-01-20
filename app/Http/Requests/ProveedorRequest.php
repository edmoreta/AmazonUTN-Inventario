<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorRequest extends FormRequest
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
            'prv_codigo' => 'required|max:10',
            'prv_nombre' => 'required|max:200',
            'prv_descripcion' => 'max:100',
            'prv_identificacion' => 'required|digits_between:10,13',
            'prv_tipo_identificacion' => 'required|max:20',
            'prv_direccion' => 'required|max:100',
            'prv_email' => 'required|max:50|email',
            'prv_celular' => 'nullable|digits:10',
            'prv_telefono' => 'nullable|digits:9'
        ];

    }
    public function messages()
    {
        return [
            'prv_codigo.unique' => 'El código ya ha sido ingresado',
            'prv_nombre.required' => 'El campo identificación no debe estar vacío',
            'prv_identificacion.required' => 'El campo identificación no debe estar vacío',
            'prv_identificacion.unique' => 'La cédula ya ha sido ingresada',
            'prv_identificacion.digits_between' => 'Identificación incorrecta',
            'prv_direccion.required' => 'El campo dirección no debe estar vacío',
            'prv_email.required' => 'El campo e-mail no debe estar vacío',
            'prv_email.unique' => 'El e-mail ya ha sido ingresado',
            'prv_email.email' => 'Formato de correo electrónico incorrecto',
            'prv_celular.digits' => 'Celular incorrecto',
            'prv_telefono.digits' => 'Teléfono incorrecto',
        ];
    }
}
