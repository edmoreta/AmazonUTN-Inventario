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
        //$categoria = Categoria::where('cat_codigo','=',$this->cat_codigo);
        // if (!Categoria::all()->isEmpty()) {
        //     $categoria = Categoria::find($this->cat_id);
        //     info($this.'///'.$categoria);
        //     return [
        //         'cat_codigo'=>'required|string|max:10|unique:inv_categorias,cat_codigo,'.$categoria->cat_codigo.',cat_codigo',
        //         'cat_codigop'=>'nullable|integer',
        //         'cat_nombre'=>'required|string|max:100',  
        //         //|unique:inv_categorias,cat_codigo,'.$categoria->cat_id.',cat_id', 
        //         //Rule::unique('inv_categorias','cat_codigo')->ignore($categoria->cat_id),                         
        //     ];
        // } else {
        //     return [
        //         'cat_codigo'=>'required|string|max:10|unique:inv_categorias,cat_codigo',
        //         'cat_codigop'=>'nullable|integer',
        //         'cat_nombre'=>'required|string|max:100',                
        //     ];
        // }

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
}
