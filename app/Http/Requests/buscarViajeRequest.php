<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class buscarViajeRequest extends FormRequest
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
            'origen'=> 'required',
            'destino' => 'required|different:origen',
            'fecha' => 'required|after_or_equal:fechaActual'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'No pueden haber campos vacios',
            'fecha.after_or_equal' => 'La fecha ingresada ya pasó, intentalo nuevamente'
        ];
    }
}
