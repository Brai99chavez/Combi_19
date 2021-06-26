<?php

namespace App\Http\Controllers;

use App\Http\Requests\empleadosRequest;
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

    public function registerEleccion(){
        return view(' public.registerEleccion');
    }

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
    public function guardarRegistroGolden(Request $request){
        $request->validate(['tarjeta' => 'required|max:16',
        'codigo' => 'required|max:3',
        'fechaVenc' => 'required']);
        return $this->registerprocess($request);
        $found = Usuarios::select('id_usuario')->where("email","=",$request->email);
        Usuarios::where('id_usuario',$found[0]->id_usuario)->update(['tarjeta' => $request->tarjeta,
         'fechaVenc' => $request->fechaVenc, 'codigo' => $request->codigo , 'id_membresia' => 1]);
        return 0;
    }
    public function guardarRegistro(empleadosRequest $request){
        if(isset($request->tarjeta)){
            $this->guardarRegistroGolden($request);
            return "Registro GOLDEN";
            return redirect()->route('login')->withErrors(['sucess'=>'Usuario GOLDEN registrado correctamente']); 
        }
        $this->registerprocess($request);
        return "Registro BASIC";
        return redirect()->route('login')->withErrors(['sucess'=>'Usuario BASIC registrado correctamente']); 
    }
    


 
}
