<?php

namespace App\Http\Controllers;

use App\Http\Requests\buscarViajeRequest;
use App\Http\Requests\clienteTarjetaRequest;
use App\Http\Requests\empleadosRequest;
use App\Models\Ciudades;
use App\Models\Rutas;
use App\Models\Usuarios;
use App\Models\Viajes;


class publicController extends Controller
{   
    
    public function publicHome(){
        $ciudades = Ciudades::where('disponible',1)->get();
        $viajes = Viajes::select('id_viaje','id_chofer','id_combi','id_ruta','precio')->get(); 
        $choferes = Usuarios::select('id_usuario','nombre', 'apellido')->where('id_permiso','2')->get(); 
        return view('public.publicHome', compact('viajes','ciudades','choferes'));
    } //
    
    public function buscarViajesProcess2(buscarViajeRequest $request){
        $ruta = Rutas::select('id_ruta')->where('id_ciudadOrigen',$request->origen)->where('id_ciudadDestino',$request->destino)->get();
        if($ruta->count()==1){
            $found = Viajes::where('id_ruta',$ruta[0]->id_ruta)->get();
            if($found->count()>0){
               $viajes = Viajes::join("usuarios","usuarios.id_usuario", "=", "viajes.id_chofer")
                ->join("rutas", "rutas.id_ruta", "=", "viajes.id_ruta")
                ->join("combis", "combis.id_combi", "=", "viajes.id_combi")
                ->join("categorias", "categorias.id_categoria", "=", "combis.id_categoria")
                ->join("ciudades", "ciudades.id_ciudad", "=", "rutas.id_ciudadOrigen")
                ->join("ciudades as c2", "c2.id_ciudad", "=", "rutas.id_ciudadDestino")
                ->select("viajes.id_viaje","categorias.nombre as categoria","usuarios.nombre as chofer", 
                "viajes.precio as precio", "ciudades.nombre as origen", "c2.nombre as destino","viajes.fecha",'viajes.hora'
                ,'viajes.id_ruta','viajes.estado','viajes.cantPasajes')
                ->where('viajes.fecha',$request->fecha)
                ->where('viajes.id_ruta',$ruta[0]->id_ruta)
                ->where('viajes.estado',"Pendiente")
                ->get(); 
                return view('public.viajesDisponibles2 ',compact('viajes'));
            }
            return redirect()->route('/')->withErrors(['error' => 'No tenemos viajes disponibles para vos']);
        }
        return redirect()->route('/')->withErrors(['error' => 'No tenemos viajes disponibles para vos']);
    }

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
