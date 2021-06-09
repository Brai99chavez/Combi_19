<?php

namespace App\Http\Controllers;
use App\Http\Requests\clienteMembresiaRequest;
use App\Http\Requests\combisRequest;
use App\Http\Requests\membresiaUPRequest;
use App\Models\Pasajes;
use App\Models\Viaje_insumos;
use App\Models\Viajes;
use App\Models\Combis;
use App\Models\Membresias;
use App\Models\Tarjetas;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function homeUser(){
        return view('user.userHome');
    } 
    public function editarPerfilCliente(){
        $usuario = Usuarios::where('id_usuario',session('id_usuario'))->get();
        return view('user.editarPerfilCliente', compact('usuario'));
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
    public function crearPasajeYPago(Request $request){

          $id_combi = Viajes::select("id_combi")->where('id_viaje',$request->id_viaje)->get();
          $cantAsientos = Combis::select("cant_asientos")->where('id_combi',$id_combi[0]->id_combi)->get();
          $pasajesDeUnViaje = Pasajes::where('id_viaje',$request->id_viaje)->get(); 
        $asientosDisponibles = $cantAsientos[0]->cant_asientos  -  $pasajesDeUnViaje->count();
          if( $asientosDisponibles >= 0 ){
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
          }else{

              return redirect()->route('viajesDisponibles')->withErrors(['sucess'=>'error pasajes agotadosss ']);
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
        ->where("usuarios.id_usuario","=","pasajes.id_usuario","and","viajes.id_viaje","=","pasajes.id_viaje")
        ->orderByDesc('pasajes.id_viaje')
        ->get();

        $viaje_insumos = Viaje_insumos::join("viajes","viajes.id_viaje","=","viaje_insumo.id_viaje")
        ->join("insumos","insumos.id_insumos","=","viaje_insumo.id_insumo")
        ->select("insumos.nombre","viajes.id_viaje")->orderBy('viajes.id_viaje','asc')->get();

        return view('user.misViajes',compact('viajes','viaje_insumos'));
    }
    public function updateMembresia(){
        $golden = Membresias::where('id_membresia',1)->get();
        return view('user.actualizarMembresia', compact('golden'));
    }
    public function upmembresiacliente(Request $request){
        $request->validate(['tarjeta' => 'required',
        'vencimiento' => 'required',
        'codigo' => 'required']);
        return $request;
    }
    /*if(session('id_membresia')==1){
        Usuarios::where('id_usuario',session('id_usuario')->update(["id_membresia" => 2, "tarjeta" => $request->tarjeta,
        'fechaVenc' => $request, 'codigo' => $request->codigo]));
        return redirect()->route('updateMembresiaCliente')->withErrors(['success'=>'Ahora usted tiene membresia GOLDEN']);
    }
        Usuarios::where('id_usuario', session('id_usuario')->update(['id_membresia' => 1]));
        return redirect()->route('updateMembresiaCliente')->withErrors(['success'=>'Ahora usted tiene membresia BASIC']);   
    }*/

}
