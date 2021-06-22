<?php

namespace App\Http\Controllers;

use App\Models\Viajes;
use Illuminate\Http\Request;

class choferController extends Controller
{
   public function homeChofer(){
        $viajesToday = Viajes::join("usuarios","usuarios.id_usuario", "=", "viajes.id_chofer")
        ->join("rutas", "rutas.id_ruta", "=", "viajes.id_ruta")
        ->join("combis", "combis.id_combi", "=", "viajes.id_combi")
        ->join("categorias", "categorias.id_categoria", "=", "combis.id_categoria")
        ->join("ciudades", "ciudades.id_ciudad", "=", "rutas.id_ciudadOrigen")
        ->join("ciudades as c2", "c2.id_ciudad", "=", "rutas.id_ciudadDestino")
        ->select("viajes.id_viaje","viajes.id_chofer","viajes.id_combi","viajes.fecha", "viajes.hora", 
        "viajes.precio", "ciudades.nombre as origen", "c2.nombre as destino","usuarios.nombre as chofer",
         "combis.patente as combi", "viajes.estado", "viajes.cantPasajes")
        ->where("viajes.id_chofer", "=", session('id_usuario'))
        ->where("viajes.estado", "Pendiente")
        ->get(); 
       return view('chofer.homeChofer', compact('viajesToday'));
   }
}
