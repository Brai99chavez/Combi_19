<?php

namespace App\Http\Controllers;

use App\Http\Requests\buscarViajeRequest;
use App\Http\Requests\clienteMembresiaRequest;
use App\Models\Categorias;
use App\Models\Ciudades;
use App\Models\Pasajes;
use App\Models\Viaje_insumos;
use App\Models\Viajes;
use App\Models\Combis;
use App\Models\Insumos;
use App\Models\Membresias;
use App\Models\Rutas;
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
    public function buscarViajesDisponibles(){
        $ciudades = Ciudades::where('disponible',1)->get();
        return view('user.buscarviaje.buscarViajes',compact('ciudades'));
    }
    public function buscarViajesProcess(buscarViajeRequest $request){
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
                return view('user.buscarviaje.viajesDisponibles ',compact('viajes'));
            }
            return redirect()->route('buscarViajesDisponibles')->withErrors(['success' => 'No tenemos viajes disponibles para vos']);
        }
        return redirect()->route('buscarViajesDisponibles')->withErrors(['success' => 'No tenemos viajes disponibles para vos']);
    }
    public function viajesDisponibles(){
        $viajes = Viajes::join("usuarios","usuarios.id_usuario", "=", "viajes.id_chofer")
        ->join("rutas", "rutas.id_ruta", "=", "viajes.id_ruta")
        ->join("combis", "combis.id_combi", "=", "viajes.id_combi")
        ->join("categorias", "categorias.id_categoria", "=", "combis.id_categoria")
        ->join("ciudades", "ciudades.id_ciudad", "=", "rutas.id_ciudadOrigen")
        ->join("ciudades as c2", "c2.id_ciudad", "=", "rutas.id_ciudadDestino")
        ->select("viajes.id_viaje","categorias.nombre as categoria","usuarios.nombre as chofer", "combis.patente", 
        "viajes.precio as precio", "ciudades.nombre as origen", "c2.nombre as destino","viajes.fecha",'viajes.hora',"viajes.cantPasajes")
        ->orderByDesc('viajes.id_viaje')
        ->get();
        $viaje_insumos = Viaje_insumos::join("viajes","viajes.id_viaje","=","viaje_insumo.id_viaje")
        ->join("insumos","insumos.id_insumos","=","viaje_insumo.id_insumo")
        ->select("insumos.nombre","viajes.id_viaje")->orderBy('viajes.id_viaje','asc')->get();

        return view('user.buscarviaje.viajesDisponibles',compact('viajes','viaje_insumos'));
    }

    public function resumenCompra(Request $request){
        $viaje = Viajes::join("usuarios","usuarios.id_usuario", "=", "viajes.id_chofer")
        ->join("rutas", "rutas.id_ruta", "=", "viajes.id_ruta")
        ->join("combis", "combis.id_combi", "=", "viajes.id_combi")
        ->join("categorias", "categorias.id_categoria", "=", "combis.id_categoria")
        ->join("ciudades", "ciudades.id_ciudad", "=", "rutas.id_ciudadOrigen")
        ->join("ciudades as c2", "c2.id_ciudad", "=", "rutas.id_ciudadDestino")
        ->select("viajes.id_viaje","categorias.nombre as categoria","usuarios.nombre as chofer", "combis.patente", 
        "viajes.precio as precio", "ciudades.nombre as origen", "c2.nombre as destino","viajes.fecha",'viajes.hora',
        "viajes.cantPasajes")->where('viajes.id_viaje',$request->id_viaje)->get();
        return view('user.pagarviaje.detallesViajeCompra', compact('viaje'));
    }
    public function crearPago(Request $request){
        $request->validate(['cantPasajesCompra' => 'required|numeric'],['numeric' => 'El valor ingresado es invalido']);
        $id_viaje = $request->id_viaje;
        $cantPasajesCompra = $request->cantPasajesCompra;
        if(session('id_membresia')==1)
            return view('user.pagarviaje.crearPago', compact('id_viaje','cantPasajesCompra'));
        else{
            $numero = Usuarios::where('id_usuario',session('id_usuario'))->select('tarjeta')->get();
            $resultado = substr($numero[0]->tarjeta, 12, 4);
            return view('user.pagarviaje.realizarPagoGolden',compact('id_viaje','resultado','cantPasajesCompra'));
        }
      }      
    public function pagoConTarjetaNueva(clienteMembresiaRequest $request){

    }
    public function pagoConTarjetaGuardada(Request $request){

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
    public function processingMembresiaUpdateGolden(clienteMembresiaRequest $request){
        if(session('id_membresia')==1){
            Usuarios::where('id_usuario',session('id_usuario'))->update(['id_membresia' => 2, 'tarjeta' => $request->tarjeta,
            'fechaVenc' => $request->fechaVenc, 'codigo' => $request->codigo]);
            session(['id_membresia'=> 2]);
            session(['tarjeta'=> $request->tarjeta]);session(['fechaVenc' => $request->fechaVenc]);session(['codigo' => $request->codigo]);
            return redirect()->route('updateMembresiaCliente')->withErrors(['success'=>'Ahora usted tiene membresia GOLDEN']);
        }
    }
    public function processingMembresiaUpdateBasic(){
        Usuarios::where('id_usuario', session('id_usuario'))->update(['id_membresia' => 1, 'tarjeta' => null,
        'fechaVenc' => null, 'codigo' => null]);
        session(['id_membresia'=> 1]);session(['tarjeta' => null]);session(['fechaVenc' => null]);session(['codigo' => null]);
        return redirect()->route('updateMembresiaCliente')->withErrors(['success'=>'Ahora usted tiene membresia BASIC']);  
    }
    public function processingUpdateTarjetaCliente(clienteMembresiaRequest $request){
        if(session('tarjeta') <> $request->tarjeta){
            Usuarios::where('id_usuario',session('id_usuario'))->update(['tarjeta' => $request->tarjeta,
            'fechaVenc' => $request->fechaVenc, 'codigo' => $request->codigo]);
            return redirect()->route('updateMembresiaCliente')->withErrors(['success'=>'Tarjeta actualizada']);
        }
        return redirect()->route('updateMembresiaCliente')->withErrors(['success'=>'La tarjeta ingresada es la actual, ingrese otra']);
    }
    public function insumosViajeCliente(Request $request){
        $insumos = Insumos::join('viaje_insumo','id_insumos','=','id_insumo')
        ->where('viaje_insumo.id_viaje',$request->id_viaje)
        ->select('insumos.nombre','insumos.descripcion','insumos.precio')->get();
        return view('user.viewInsumosViaje', compact('insumos'));
    }
}
