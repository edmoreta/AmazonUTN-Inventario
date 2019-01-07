<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        $maxAnio=date('Y');
        return [
            'cat_codigo'=>'required|string|max:10',
            'cat_codigop'=>'nullable|integer',
            'cat_nombre'=>'required|string|max:100',                            
        ];
    }
}
