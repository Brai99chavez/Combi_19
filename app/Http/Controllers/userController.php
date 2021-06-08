<?php

namespace App\Http\Controllers;

use App\Models\Pasajes;
use App\Models\Viaje_insumos;
use App\Models\Viajes;
use App\Http\Requests\Request;
use App\Models\Combis;
use App\Models\Tarjetas;
use App\Models\Usuarios;
use Illuminate\Http\Client\Request as ClientRequest;
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
        "viajes.precio as precio", "ciudades.nombre as origen", "c2.nombre as destino","viajes.fecha",'viajes.hora',"combis.cant_asientos")
        ->orderByDesc('viajes.id_viaje')
        ->get();

        $viaje_insumos = Viaje_insumos::join("viajes","viajes.id_viaje","=","viaje_insumo.id_viaje")
        ->join("insumos","insumos.id_insumos","=","viaje_insumo.id_insumo")
        ->select("insumos.nombre","viajes.id_viaje")->orderBy('viajes.id_viaje','asc')->get();

        return view('user.viajesDisponibles',compact('viajes','viaje_insumos'));
    }
// crear pasaje y pagoo clienteeeeee
    public function crearPasajeYPago(HttpRequest $request){


          $id_combi = Viajes::select("id_combi")->where('id_viaje',$request->id_viaje)->get();

          Combis::where('id_combi',$id_combi)->decrement('cant_asientos');

          $newPago = new Tarjetas; 
          $newPago->numero_tarjeta = $request->tarjeta;
          $newPago->cod_seguridad = $request->codigo;
          $newPago->vencimiento = $request->fechaVenc;
          $newPago->id_usuario = $request->id_usuario;
          $newPago->save();


          $newPasaje = new Pasajes;
          $newPasaje->id_usuario = $request->id_usuario;
          $newPasaje->id_viaje = $request->id_viaje;
          $newPasaje->save();
          return redirect()->route('misViajes')->withErrors(['sucess'=>'pasaje creado con Exito']);

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
        ->where("usuarios.id_usuario","=","pasajes.id_usuario","and","viajes.id_viaje","=","pasajes.id_viaje")
        ->orderByDesc('pasajes.id_viaje')
        ->get();

        $viaje_insumos = Viaje_insumos::join("viajes","viajes.id_viaje","=","viaje_insumo.id_viaje")
        ->join("insumos","insumos.id_insumos","=","viaje_insumo.id_insumo")
        ->select("insumos.nombre","viajes.id_viaje")->orderBy('viajes.id_viaje','asc')->get();

        return view('user.misViajes',compact('viajes','viaje_insumos'));
    }

}
