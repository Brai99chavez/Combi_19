<?php

namespace App\Http\Controllers;

use App\Models\Pasajes;
use App\Models\Viaje_insumos;
use App\Models\Viajes;
use App\Http\Requests\Request;
use Illuminate\Http\Request as HttpRequest;

class userController extends Controller
{
    public function homeUser(){

        return view('user.userHome');
    } //

    public function editarPerfilCliente(){

        return view('user.editarPerfilCliente');
    }

    public function viajesDisponibles(){
        $viajes = Viajes::join("usuarios","usuarios.id_usuario", "=", "viajes.id_chofer")
        ->join("rutas", "rutas.id_ruta", "=", "viajes.id_ruta")
        ->join("combis", "combis.id_combi", "=", "viajes.id_combi")
        ->join("categorias", "categorias.id_categoria", "=", "combis.id_categoria")
        ->join("ciudades", "ciudades.id_ciudad", "=", "rutas.id_ciudadOrigen")
        ->join("ciudades as c2", "c2.id_ciudad", "=", "rutas.id_ciudadDestino")
        ->select("viajes.id_viaje","categorias.nombre as categoria","usuarios.nombre as chofer", "combis.patente", 
        "viajes.precio as precio", "ciudades.nombre as origen", "c2.nombre as destino","viajes.fecha",'viajes.hora')
        ->orderByDesc('viajes.id_viaje')
        ->get();

        $viaje_insumos = Viaje_insumos::join("viajes","viajes.id_viaje","=","viaje_insumo.id_viaje")
        ->join("insumos","insumos.id_insumos","=","viaje_insumo.id_insumo")
        ->select("insumos.nombre","viajes.id_viaje")->orderBy('viajes.id_viaje','asc')->get();

        return view('user.viajesDisponibles',compact('viajes','viaje_insumos'));
    }

    public function crearPasaje(HttpRequest $request){

        $found = Pasajes::where("id_viaje","=",$request->id_viaje );
        if($found->count() == 0){ 
    
          $newPasaje = new Pasajes;
          $newPasaje->id_usuario = $request->id_usuario;
          $newPasaje->id_viaje = $request->id_viaje;
          $newPasaje->save();
          return redirect()->route('misViajes')->withErrors(['sucess'=>'pasaje creado con Exito']);
        } else {
           return redirect()->route('viajesDisponibles')->withErrors(['sucess'=>'pasaje ya comprado']);
        } 

    }

    public function misViajes(){

        
        $viajes = Pasajes::join("viajes","viajes.id_viaje","=","pasajes.id_viaje")
        ->join("usuarios","usuarios.id_usuario", "=", "viajes.id_chofer")
        ->join("rutas", "rutas.id_ruta", "=", "viajes.id_ruta")
        ->join("combis", "combis.id_combi", "=", "viajes.id_combi")
        ->join("categorias", "categorias.id_categoria", "=", "combis.id_categoria")
        ->join("ciudades", "ciudades.id_ciudad", "=", "rutas.id_ciudadOrigen")
        ->join("ciudades as c2", "c2.id_ciudad", "=", "rutas.id_ciudadDestino")
        ->select("pasajes.id_viaje","categorias.nombre as categoria","usuarios.nombre as chofer", "combis.patente", 
        "viajes.precio as precio", "ciudades.nombre as origen", "c2.nombre as destino","viajes.fecha",'viajes.hora')
        ->orderByDesc('pasajes.id_viaje')
        ->get();

        
        $viaje_insumos = Viaje_insumos::join("viajes","viajes.id_viaje","=","viaje_insumo.id_viaje")
        ->join("insumos","insumos.id_insumos","=","viaje_insumo.id_insumo")
        ->select("insumos.nombre","viajes.id_viaje")->orderBy('viajes.id_viaje','asc')->get();

        return view('user.misViajes',compact('viajes','viaje_insumos'));
    }

}
