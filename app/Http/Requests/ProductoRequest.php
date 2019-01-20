<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'pro_codigo' => 'required|string|max:10|unique:inv_productos,pro_codigo',
            'cat_id' => 'required|integer',
            'pro_nombre' => 'required|string|max:200',
            'pro_descripcion' => 'required|string|max:300',
            'pro_caracteristicas' => 'required|string',
            'pro_precio' => 'required|numeric|min:0.01',
            'pro_costo' => 'required|numeric|min:0.01',
            'pro_stock' => 'required|integer',
            'pro_foto'=>'nullable|file|mimes:jpeg,png,jpg,JPG|dimensions:min_width=400,min_height=400,max_width=2000,max_height=2000|max:2048',
        ];
    }
}
