<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ciudadesRequest extends FormRequest
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
            'nombre' =>'required',
            'direccion' =>'required',
            'disponible' =>'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'No puede haber campos vacios', 
            'nombre' => 'El nombre ya se encuentra registrado en el sistema'
        ];
    }
}
