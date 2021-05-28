<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerRequest;
use Illuminate\Http\Request;
use App\Models\Usuarios;

class RegisterController extends Controller
{
    public function guardarRegistro(registerRequest $request){
        // return redirect()->route('public.login');
        $found = Usuarios::where("email","=",$request->email);
        if($found->count() == 0){ 
    
          $newUser = new Usuarios;
          $newUser->nombre = $request->nombre;
          $newUser->apellido = $request->apellido;
          $newUser->dni = $request->dni;
          $newUser->email = $request->email;
          $newUser->contraseña = $request->contraseña;
          $newUser->save();
          return redirect()->route('login')->withErrors(['sucess'=>'usuario creado con Exito']);
        } else {
           return redirect()->route('login')->withErrors(['sucess'=>'usuario existenteeee']);
        } 
    }

  // no sirve 
    public function guardarRegistroGolden(registerRequest $request){
    
        
        
        $newUser = new Usuarios;
        $newUser->nombre = $request->nombre;
        $newUser->apellido = $request->apellido;
        $newUser->dni = $request->dni;
        $newUser->tarjeta = $request->tarjeta;
        $newUser->fechaVenc = $request->fechaVenc;
        $newUser->codigo = $request->codigo;
        $newUser->id_membresia = 1; 
        $newUser->email = $request->email;
        $newUser->contraseña = $request->contraseña;
        $newUser->save();
        return redirect()->route('login')->withErrors(['sucess'=>'usuario creado con Exito']);
    
    }

}
