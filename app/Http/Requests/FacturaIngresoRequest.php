<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Validator;

class FacturaIngresoRequest extends FormRequest
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
            'prv_id' =>'required|numeric',
            'doc_codigo' =>'required|digits_between:3,40',
            'doc_fecha' =>'required|date',
            'pro_id' =>'required',
            'cantidad' =>'required',
            'costo' => 'required',
            'precio'=>'required',
         

        ];
       
    }

    
}
