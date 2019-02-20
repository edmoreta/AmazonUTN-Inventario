<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Producto;

class ProductoRequest extends FormRequest
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

        switch($this->method())
        {
            case 'PATCH': //update               
                $producto = Producto::find($this->pro_id);
                return [
                    'pro_codigo' => 'required|string|max:10|unique:inv_productos,pro_codigo,'.$producto->pro_id.',pro_id',
                    'cat_id' => 'required|integer',
                    'pro_nombre' => 'required|string|max:200',
                    'pro_descripcion' => 'required|string|max:300',
                    'pro_caracteristicas' => 'required|string',
                    'pro_precio' => 'required|numeric|min:0.01',
                    'pro_costo' => 'required|numeric|min:0.01',
                    //'pro_stock' => 'required|integer',
                    'pro_estado' => 'required|boolean',
                    'pro_foto'=>'nullable|file|mimes:jpeg,png,jpg,JPG|dimensions:min_width=200,min_height=200,max_width=4000,max_height=4000|max:2048',
                ];
                
                break; 
            case 'PUT': //update
                break; 
            case 'POST': //store
                
                return [
                    'pro_codigo' => 'required|string|max:10|unique:inv_productos,pro_codigo',
                    'cat_id' => 'required|integer',
                    'pro_nombre' => 'required|string|max:200',
                    'pro_descripcion' => 'required|string|max:300',
                    'pro_caracteristicas' => 'required|string',
                    'pro_precio' => 'required|numeric|min:0.01',
                    'pro_costo' => 'required|numeric|min:0.01',
                    //'pro_stock' => 'required|integer',
                    'pro_foto'=>'nullable|file|mimes:jpeg,png,jpg,JPG|dimensions:min_width=200,min_height=200,max_width=4000,max_height=4000|max:2048',
                ];
                
                break; 
            default:
                break;
        }        
    }

    public function messages()
    {
        return [
            'pro_codigo.unique' => 'El producto ya ha sido ingresado',
            'cat_id.required' => 'El campo categoría no debe estar vacío',
            'pro_nombre.required' => 'El campo nombre no debe estar vacío',
            'pro_descripcion.required' => 'El campo descripción no debe estar vacío',
            'pro_caracteristicas.required' => 'El campo características no debe estar vacío',
            'pro_precio.required' => 'El campo precio no debe estar vacío',
            'pro_costo.required' => 'El campo costo no debe estar vacío',
        ];
    }
}
