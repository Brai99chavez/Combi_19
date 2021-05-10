<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerRequest;
use App\Models\Combis;
use App\Models\Usuarios;
use App\Models\Viajes;
use Illuminate\Http\Request;

class publicController extends Controller
{   
    
    public function publicHome(){
        $viajes = Viajes::select('id_viaje','id_chofer','id_combi','id_ruta','precio')->get(); 
        $choferes = Usuarios::select('id_usuario','nombre', 'apellido')->where('id_permiso','2')->get(); 
        return view('public.publicHome', compact('viajes','choferes'));
    } //


    public function login(){
        return view('public.login');
    } //


    public function register(){
        return view('public.register');
    } //


    public function saveFormRegister(registerRequest $request){
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

    public function homeUsuario(Request $request){
        return $request->session()->all();
    }
    
}
