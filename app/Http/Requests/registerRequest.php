<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
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
            'nombre' => 'required|max:20',
            'apellido' => 'required|max:20',
            'dni' => 'required|max:10',
            'email' => 'required|unique:Usuarios',
            'contraseña' => 'required'
        ];
    }

    public function attributes()
    {
        return[
            // 'nombre' => 'nombre de curso'  EJEMPLO DE COMO CAMBIAR LO QUE IMPRIME EL REQUEST RESPECTO A LA VARIALBE
        ];
    }

    public function messages()
    {
        return[
            // 'nombre.required' => 'el curso se ingreso mal o no se ingreso'  EJEMPLO DE COMO CAMBIAR LO QUE IMPRIME EL MENSAJE TOTAL DEL REQUEST
        ];
    }
    
}
