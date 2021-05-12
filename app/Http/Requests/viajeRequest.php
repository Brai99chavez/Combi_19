<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class viajeRequest extends FormRequest
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
            'id_chofer' => 'required|integer|gt:0',
            'id_combi' => 'required|integer|gt:0',
            'precio' => 'required|gt:0',
            'fecha' => 'required',
            'hora' => 'required',
            'origen' => 'required',
            'destino' => 'required'
        ];
    }
}
