<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class combisRequest extends FormRequest
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
            'patente' =>'required',
            'cant_asientos' =>'required|gt:0',
            'id_categoria' => 'required',
        ];
    }
}
