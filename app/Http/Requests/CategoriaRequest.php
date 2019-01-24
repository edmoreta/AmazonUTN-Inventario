<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;
use App\Categoria;

class CategoriaRequest extends FormRequest
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
                
                $categoria = Categoria::find($this->cat_id);
                //info($this.'///'.$categoria);
                return [
                    'cat_codigo'=>'required|string|max:10|unique:inv_categorias,cat_codigo,'.$categoria->cat_id.',cat_id',
                    'cat_codigop'=>'nullable|integer',
                    'cat_nombre'=>'required|string|max:100|unique:inv_categorias,cat_nombre,'.$categoria->cat_id.',cat_id',
                    'cat_estado'=>'required|boolean',
                ];
                
                break; 
            case 'PUT': //update
                break; 
            case 'POST': //store
                
                return [
                    'cat_codigo'=>'required|string|max:10|unique:inv_categorias,cat_codigo',
                    'cat_codigop'=>'nullable|integer',
                    'cat_nombre'=>'required|string|max:100|unique:inv_categorias,cat_nombre',                
                ];
                
                break; 
            default:
                break;
        }
    }

    public function messages()
    {
        return [
            'cat_codigo.unique' => 'El código ya ha sido ingresado',
            'cat_codigo.required' => 'El campo código no debe estar vacío',
            'cat_nombre.unique' => 'El nombre ya ha sido ingresado',
            'cat_nombre.required' => 'El campo nombre no debe estar vacío',            
        ];
    }
}
