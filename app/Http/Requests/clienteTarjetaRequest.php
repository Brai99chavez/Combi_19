<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class clienteTarjetaRequest extends FormRequest
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
            'contraseña'=>'required',
            'contraseñavalidation' => 'required|same:contraseña',
            'tarjeta' => 'required|digits:16|numeric',
            'fechaVenc' => 'required',
            'codigo' => 'required|digits:3|numeric'
        ];
    }
    public function messages()
    {
        return [
            'dni.unique' => 'El DNI ingresado ya pertenece a un empleado registrado',
            'email.unique' => 'El email ingresado ya pertenece a un empleado registrado',
            'contraseñavalidation.same' => 'Las contraseñas no coinciden',
            'nombre.max' => 'El nombre debe tener menos de 40 caracteres',
            'apellido.max' => 'El apellido debe tener menos de 40 caracteres',
            'dni.max' => 'DNI invalido',
            'required' => 'Los campos no pueden estar vacios',
            'tarjeta.digits' => 'La tarjeta debe tener 16 digitos',
            'codigo.digits' => 'El codigo debe tener 3 digitos',
        ];
    }
}

