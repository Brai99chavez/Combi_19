<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class clienteMembresiaRequest extends FormRequest
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
            'tarjeta' => 'required|digits:16|numeric',
            'vencimiento' => 'required',
            'codigo' => 'required|digits:3|numeric'
        ];
    }
    /*public function messages()
    {
        return [
            'tarjeta.digits' => 'El numero de tarjeta debe constar de 16 digitos',
            'codigo.digits' => 'El codigo de seguridad debe constar de 3 digitos',
            'required' => 'Los campos no pueden estar vacios',
            'tarjeta.numeric' => 'Numero de tarjeta invalido',
            'codigo.numeric'=> 'Codigo de seguridad invalido'
        ];
    }*/
}
