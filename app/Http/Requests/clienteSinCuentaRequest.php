<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class clienteSinCuentaRequest extends FormRequest
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
            'nombre'=>'required|max:40',
            'apellido'=>'required|max:40',
            'dni'=>'required|max:10|unique:Usuarios',
            'email'=>'required|email|unique:Usuarios',
            'tarjeta' => 'required|digits:16|numeric',
            'fechaVenc' => 'required',
            'codigo' => 'required|digits:3|numeric',
            'cantPasajes' => 'required|numeric|gt:0'
        ];
    }

    public function messages()
    {
        return [
            'dni.unique' => 'El DNI ingresado pertenece a un cuenta registrada',
            'email.unique' => 'El email ingresado pertenece a un cuenta registrada',
            'nombre.max' => 'El nombre debe tener menos de 40 caracteres',
            'apellido.max' => 'El apellido debe tener menos de 40 caracteres',
            'dni.max' => 'DNI invalido',
            'required' => 'Los campos no pueden estar vacios',
            'tarjeta.digits' => 'La tarjeta debe tener 16 digitos',
            'codigo.digits' => 'El codigo ded seguridad debe tener 3 digitos'];

    }
}
