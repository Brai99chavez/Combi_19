<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Http\Requests\loginRequest;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function autenticacion(loginRequest $request){

        $user = Usuarios::select('nombre','apellido','email','contraseña','id_permiso')->where('email',$request->email)->get();

        if (($user->isNotEmpty())&&($request->contraseña == $user[0]->contraseña)) {
            session(['nombre'=>$user[0]->nombre]); 
            session(['apellido'=>$user[0]->apellido]); 
            session(['email'=>$user[0]->email]); 
            session(['id_permiso'=>$user[0]->id_permiso]); 

            if ($user[0]->id_permiso == 1) {
                return redirect()->route('homeUser');
            }elseif ($user[0]->id_permiso == 2) {
                return redirect()->route('homeChofer');
            }elseif ($user[0]->id_permiso == 3) {
                return redirect()->route('homeadmin');
            }

            
        }else{
            return redirect()->route('login')->withErrors(['log'=>'email o contraseña incorrecto']);
        }
    } //

    public function logOut(){
        session()->pull('nombre');
        session()->pull('apellido');
        session()->pull('email');
        session()->pull('id_permiso');
        return redirect()->route('/');
    }
}
