<?php

namespace App\Http\Controllers;

use App\Models\Ciudades;
use App\Models\Insumos;
use App\Models\Rutas;
use App\Models\Viaje_insumos;
use App\Models\Viajes;
use Illuminate\Http\Request;

class ViajesController extends Controller
{
    public function homeviajes(){
        $viajes = Viajes::join("usuarios","usuarios.id_usuario", "=", "viajes.id_chofer")
        ->join("rutas", "rutas.id_ruta", "=", "viajes.id_ruta")
        ->join("combis", "combis.id_combi", "=", "viajes.id_combi")
        ->join("categorias", "categorias.id_categoria", "=", "combis.id_categoria")
        ->join("ciudades", "ciudades.id_ciudad", "=", "rutas.id_ciudadOrigen")
        ->join("ciudades as c2", "c2.id_ciudad", "=", "rutas.id_ciudadDestino")
        ->select("viajes.id_viaje","categorias.nombre as categoria","usuarios.nombre as chofer", "combis.patente", 
        "viajes.precio as precio", "ciudades.nombre as origen", "c2.nombre as destino","viajes.fecha",'viajes.hora')
        ->get();

        $viaje_insumos = Viaje_insumos::join("viajes","viajes.id_viaje","=","viaje_insumo.id_viaje")
        ->join("insumos","insumos.id_insumos","=","viaje_insumo.id_insumo")
        ->select("insumos.nombre","viajes.id_viaje")->orderBy('viajes.id_viaje','asc')->get();

        return view("admin.viajes.homeViajes", compact('viajes','viaje_insumos'));
    }
    public function updateviajes(Request $request){
        $viaje = Viajes::join("usuarios","usuarios.id_usuario", "=", "viajes.id_chofer")
        ->join("rutas", "rutas.id_ruta", "=", "viajes.id_ruta")
        ->join("combis", "combis.id_combi", "=", "viajes.id_combi")
        ->join("categorias", "categorias.id_categoria", "=", "combis.id_categoria")
        ->join("ciudades", "ciudades.id_ciudad", "=", "rutas.id_ciudadOrigen")
        ->join("ciudades as c2", "c2.id_ciudad", "=", "rutas.id_ciudadDestino")
        ->select("viajes.id_viaje","viajes.id_chofer","viajes.precio", "ciudades.nombre as origen", "c2.nombre as destino",
        "rutas.id_ciudadOrigen", "rutas.id_ciudadDestino")
        ->where("viajes.id_viaje", "=", $request->id_viaje)
        ->get();
        return view('admin.viajes.updateViajes',compact('viaje'));
    }
    public function createviaje(){
        $ciudades = Ciudades::all();
        return view('admin.viajes.createViaje', compact('ciudades'));
    }
    public function showviaje(Request $request){
        $ruta = new Rutas();
        $viaje = new Viajes();
        $ruta->id_ciudadOrigen = $request->origen;
        $ruta->id_ciudadDestino = $request->destino;
        $ruta->save();
        $aux = Rutas::select("rutas.id_ruta")->where("rutas.id_ciudadOrigen", "=", $request->origen, "and", "rutas.id_ciudadDestino", "=", $request->destino)->first();
        $viaje->id_ruta = $aux->id_ruta;  
        $viaje->id_chofer = $request->id_chofer;
        $viaje->id_combi = $request->id_combi;
        $viaje->precio = $request->precio;
        $viaje->fecha = $request->fecha;
        $viaje->hora = $request->hora;
        $origen = Ciudades::select("ciudades.nombre")->where("ciudades.id_ciudad", "=", $request->origen)->first();
        $destino = Ciudades::select("ciudades.nombre")->where("ciudades.id_ciudad", "=", $request->destino)->first();
        $viaje->save();
        return view('admin.viajes.viajeShow', compact('viaje', 'origen', 'destino'));
    }
    public function deleteviajes(){
        return view('admin.viajes.deleteviajes');
    }

}
