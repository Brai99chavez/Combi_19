<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class empleadosRequest extends FormRequest
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
            'dni'=>'required|numeric|unique:Usuarios',
            'email'=>'required|email|unique:Usuarios',
            'contraseña'=>'required',
            'contraseñavalidation' => 'required|same:contraseña'
        ];
    }
    public function messages()
    {
        return [
            'dni.unique' => 'El DNI ingresado ya pertenece a un empleado registrado',
            'email.unique' => 'El email ingresado ya pertenece a un empleado registrado',
            'contraseñavalidation.same' => 'Las contraseñas no coinciden',
            'max' => 'El nombre o apellido debe tener menos de 40 caracteres',
            'required' => 'Los campos no pueden estar vacios'
        ];
    }
}
