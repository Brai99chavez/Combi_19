<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Http\Requests\loginRequest;
use App\Models\Viajes;

class AuthController extends Controller
{
    public function autenticacion(loginRequest $request){
        $user = Usuarios::where('email',$request->email)->where('contraseña',$request->contraseña)->get();
        if ($user->count()==1) {
            session(['nombre'=>$user[0]->nombre]); 
            session(['apellido'=>$user[0]->apellido]); 
            session(['email'=>$user[0]->email]); 
            session(['dni'=>$user[0]->dni]); 
            session(['contraseña'=>$user[0]->contraseña]); 
            session(['id_permiso'=>$user[0]->id_permiso]); 
            session(['tarjeta'=>$user[0]->tarjeta]); 
            session(['fechaVenc'=>$user[0]->fechaVenc]); 
            session(['codigo'=>$user[0]->codigo]); 
            session(['id_usuario'=>$user[0]->id_usuario]);
            session(['id_membresia'=>$user[0]->id_membresia]);
            Viajes::where('fecha','<',date('Y-m-d'))->where('estado','<>',"Cancelado")->update(['estado' => 'Finalizado']);
            
            if (session()->get('id_permiso') == 1) {
                return redirect()->route('homeUser');
            }elseif (session()->get('id_permiso') == 2) {
                return redirect()->route('homeChofer');
            }elseif (session()->get('id_permiso') == 3) {
                return redirect()->route('homeadmin');
            }

        }else{
            return redirect()->route('login')->withErrors(['log'=>'email inexistente o contraseña incorrecta']);
        }
    }
    public function logOut(){
        session()->flush();
        return redirect()->route('/');
    }
}
