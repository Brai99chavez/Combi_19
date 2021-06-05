<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Http\Requests\loginRequest;
use GuzzleHttp\Psr7\Request;

class AuthController extends Controller
{
    public function autenticacion(loginRequest $request){
        $user = Usuarios::select('nombre','apellido','email','contraseña','dni','id_permiso','tarjeta','fechaVenc','codigo')->where('email',$request->email)->get();

        if (($user->isNotEmpty())&&($request->contraseña == $user[0]->contraseña)) {
            session(['nombre'=>$user[0]->nombre]); 
            session(['apellido'=>$user[0]->apellido]); 
            session(['email'=>$user[0]->email]); 
            session(['dni'=>$user[0]->dni]); 
            session(['contraseña'=>$user[0]->contraseña]); 
            session(['id_permiso'=>$user[0]->id_permiso]); 
            session(['tarjeta'=>$user[0]->tarjeta]); 
            session(['fechaVenc'=>$user[0]->fechaVenc]); 
            session(['codigo'=>$user[0]->codigo]); 
            

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
    } //

    public function logOut(){
        session()->flush();
        return redirect()->route('/');
    }
}
