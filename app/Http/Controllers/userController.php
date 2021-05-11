<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Models\Usuarios;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    
    public function autenticacion(loginRequest $request){

        $user = Usuarios::select('email','contraseña','id_permiso')->where('email',$request->email)->get();

        if (($user->isNotEmpty())&&($request->contraseña == $user[0]->contraseña)) {
            session(['email'=>$request->email]); 
            session(['id_permiso'=>$user[0]->id_permiso]); 
            $request->session()->regenerate();
            return $request->session()->all();
            return redirect()->route('homeUser');
        }else{
            return redirect()->route('login')->withErrors(['log'=>'email o contraseña incorrecto']);
        }


    } //

    public function homeUser(){

        
        return view('user.userHome');
    } //



}
