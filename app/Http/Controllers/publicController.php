<?php

namespace App\Http\Controllers;

use App\Http\Requests\clienteTarjetaRequest;
use App\Http\Requests\empleadosRequest;
use App\Models\Usuarios;
use App\Models\Viajes;


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

    public function registerGolden(){
        return view(' public.registerGolden');
    }
    public function registerprocess($request){
        $newUser = new Usuarios;
        $newUser->nombre = $request->nombre;
        $newUser->apellido = $request->apellido;
        $newUser->dni = $request->dni;
        $newUser->email = $request->email;
        $newUser->id_membresia = 1; 
        $newUser->contraseña = $request->contraseña;
        $newUser->save();
        return 0;
    }
    public function guardarRegistroGolden(clienteTarjetaRequest $request){
        $this->registerprocess($request);
        $found = Usuarios::select('id_usuario')->where("email","=",$request->email)->get();
        Usuarios::where('id_usuario',$found[0]->id_usuario)->update(['tarjeta' => $request->tarjeta,
         'fechaVenc' => $request->fechaVenc, 'codigo' => $request->codigo , 'id_membresia' => 1]);
         return redirect()->route('login')->withErrors(['sucess'=>'Usuario GOLDEN registrado correctamente']); 
    }
    public function guardarRegistro(empleadosRequest $request){
        $this->registerprocess($request);
        return redirect()->route('login')->withErrors(['sucess'=>'Usuario BASIC registrado correctamente']); 
    }
    


 
}
