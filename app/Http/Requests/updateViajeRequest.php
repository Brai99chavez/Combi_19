<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateViajeRequest extends FormRequest
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
            'precio' => 'required|numeric',
            'fecha' => 'required|after_or_equal:ladeHoy',
            'cantPasajes' => 'required|numeric|gte:0',
            'estado' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'cantPasajes.numeric' => 'La cantidad de pasajes ingresada es invalida',
            'cantPasajes.gte' => 'El valor ingresado de pasajes es incorrecto',
            'required' => 'Los campos no puede ser estar vacios'
        ];
    }
}
