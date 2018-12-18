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
            'prv_nombre' => 'required|max:100',
            'prv_descripcion' => 'required|max:100',
            'prv_identificacion' => 'required|max:13',
            'prv_tipo_identificacion' => 'required|max:20',
            'prv_direccion' => 'required|max:100',
            'prv_email' => 'required|max:50',
            'prv_celular' => 'max:10',
            'prv_telefono' => 'max:10'
        ];

    }
    public function messages()
    {
        return [
            'prv_codigo.unique' => 'El código ya ha sido ingresado',
            'prv_nombre.required' => 'El campo nombres no debe estar vacío ',
            'prv_descripcion.required' => 'El campo descripcion no debe estar vacío ',
            'prv_identificacion.unique' => 'El numero cedula ya ha sido ingresada',
            'prv_tipo_identificacion.required' => 'El campo Tipo Identificación no debe estar vacío ',
            'prv_direccion.required' => 'El campo dirección no debe estar vacío ',
            'prv_email.unique' => 'El e-mail ya ha sido ingresada',
        ];
    }
}
