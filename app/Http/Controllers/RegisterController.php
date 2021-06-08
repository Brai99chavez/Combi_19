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
    
     //  actualizar registro de cliente
     public function saveCli(Request $request){
      $request->validate([
        'nombre'=>'required|max:40',
        'apellido'=>'required|max:40',
        'dni' => 'required|numeric',
        'email' => 'required|email',
        'contraseña' => 'required'
      ],['required' => 'Los campos no pueden estar vacios','max' => 'El nombre o apellido debe tener menos de 40 caracteres']);
      Usuarios::where('id_usuario',$request->id_usuario)->update(["nombre"=> $request->nombre,
      "apellido" => $request->apellido,"contraseña" => $request->contraseña, "tarjeta"=>$request->tarjeta,
      "fechaVenc"=>$request->fechaVenc, "codigo"=>$request->codigo]);
      if($this->newsEmailorDNI($request)){
        if($this->updateEmailDNI($request)==0){
            return redirect()->route('editarPerfilCliente')->withErrors(['sucess'=>'Error, DNI o email ya registrados']);
        }
      }
      return redirect()->route('editarPerfilCliente')->withErrors(['sucess'=>'se modificaron los datos correctamente']);
   }

   private function newsEmailorDNI($request){
    $usuarioActual = Usuarios::select('email','dni')->where('id_usuario', $request->id_usuario)->get();
    if(($usuarioActual[0]->email <> $request->email) || ($usuarioActual[0]->dni <> $request->dni)){
        return true;
    }     
    return false;
    }
   private function updateEmailDNI($request){
    $found = Usuarios::where('email', $request->email)->get();
    $found2 = Usuarios::where('dni', $request->dni)->get();
    if($found->count() == 0){
        Usuarios::where('id_usuario',$request->id_usuario)->update(["email" => $request->email]);
        return 1;
    }elseif($found2->count() == 0){
        Usuarios::where('id_usuario',$request->id_usuario)->update([ "dni" => $request->dni]);
        return 1;
    }
    return 0;
} 

}
