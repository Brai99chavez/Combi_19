<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class choferRequest extends FormRequest
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
            'email'=>'required|email',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'El email ingresado ya pertenece a un empleado registrado',
            'nombre.max' => 'El nombre debe tener menos de 40 caracteres',
            'apellido.max' => 'El apellido debe tener menos de 40 caracteres',
        ];
    }
}
