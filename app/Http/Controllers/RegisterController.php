<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerRequest;
use App\Models\Usuarios;

class RegisterController extends Controller
{
    public function guardarRegistro(registerRequest $request){
        // return redirect()->route('public.login');
        $newUser = new Usuarios;
        $newUser->nombre = $request->nombre;
        $newUser->apellido = $request->apellido;
        $newUser->dni = $request->dni;
        $newUser->tarjeta = $request->tarjeta;
        if (isset($request->tarjeta)) {
            $newUser->id_membresia = 1;
        }
        $newUser->email = $request->email;
        $newUser->contraseña = $request->contraseña;
        $newUser->save();
        return redirect()->route('login');
    }
}
