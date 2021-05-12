<?php

namespace App\Http\Controllers;

use App\Http\Requests\viajeRequest;
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
        ->select("viajes.id_viaje","viajes.id_chofer","viajes.id_combi","viajes.fecha", "viajes.hora", 
        "viajes.precio", "ciudades.nombre as origen", "c2.nombre as destino")
        ->where("viajes.id_viaje", "=", $request->id_viaje)
        ->get(); 

       // $viaje = Viajes::findOrFail($id); 
        $ciudades = Ciudades::all();
       
        return view("admin.viajes.updateViajes", compact('viaje','ciudades'));
    }

    public function updateviajes1(Request $request ){

     
        
      Viajes::where("id_viaje", "=", $request->id_viaje)
      ->update(["id_chofer"=> $request->id_chofer, "id_combi"=> $request->id_combi, 
      "fecha"=> $request->fecha, "hora"=> $request->hora, "precio"=> $request->precio]);

      return redirect()->route('homeviajes')
      ->withErrors(['updateprocess'=>'Membresia modificada correctamente']);
        
       
    }

    public function createviaje(){
        $ciudades = Ciudades::all();
        $insumos = Insumos::select("nombre", "id_insumos")->get();
        return view('admin.viajes.createViaje', compact('ciudades','insumos'));
    }
    public function createviajeprocess(viajeRequest $request){
        $viaje = new Viajes();
        $this->createviajeprocess_ruta($request);
        $aux = Rutas::select("rutas.id_ruta")->where("rutas.id_ciudadOrigen", "=", $request->origen, "and", "rutas.id_ciudadDestino", 
        "=", $request->destino)->first();
        $viaje->id_ruta = $aux->id_ruta;  
        $viaje->id_chofer = $request->id_chofer;
        $viaje->id_combi = $request->id_combi;
        $viaje->precio = $request->precio;
        $viaje->fecha = $request->fecha;
        $viaje->hora = $request->hora;
        $viaje->save();
        $idviaje = Viajes::select("viajes.id_viaje")->where("viajes.fecha", "=" ,$request->fecha, "and", "viajes.hora", "=", $request->hora, 
        "and", "viajes.id_chofer", "=", $request->id_chofer)->first();
        $insumos = Insumos::select("id_insumos","nombre")->get();
        return view('admin.viajes.insumosViajes', compact('idviaje', 'insumos'));
    }
    private function createviajeprocess_ruta($request){
        $found = Rutas::where("rutas.id_ciudadOrigen", "=", $request->origen,"and", "rutas.id_ciudadDestino", "=", $request->destino)->get();
        if(!empty($found)){    
            $rutaNew = new Rutas;
            $rutaNew->id_ciudadOrigen = $request->origen;
            $rutaNew->id_ciudadDestino = $request->destino;
            $rutaNew->save();
        }
        return 0;
    }
    public function createviajeprocess_insumos(Request $request){
       if(!empty($request)){ 
            for($i = 0; $i < count($request->insumo); $i++){
                $newInsumo = new Viaje_insumos;
                $newInsumo->id_viaje = $request->id_viaje;
                $newInsumo->id_insumo = $request->insumo[$i];
                $newInsumo->save();
            }
        }
        return redirect()->route('homeviajes');        

    }

    public function deleteviajes(){
        return view('admin.viajes.deleteViajes');
    }

}
