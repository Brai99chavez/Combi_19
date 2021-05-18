<?php

namespace App\Http\Controllers;

use App\Http\Requests\viajesRequest;
use App\Models\Ciudades;
use App\Models\Combis;
use App\Models\Insumos;
use App\Models\Rutas;
use App\Models\Usuarios;
use App\Models\Viaje_insumos;
use App\Models\Viajes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        ->orderByDesc('viajes.id_viaje')
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
        $ciudades = Ciudades::all();
        $Combis = Combis::select('id_combi','patente')->get();
        $Choferes = Usuarios::select('id_usuario','nombre')->where('id_permiso',2)->get();
        return view("admin.viajes.updateViajes", compact('viaje','ciudades','Choferes','Combis'));
    }

    public function updateviajesprocess(Request $request){
        $this->createviajeprocess_ruta($request);
        $aux = Rutas::select("rutas.id_ruta")->where("rutas.id_ciudadOrigen", "=", $request->origen, "and", "rutas.id_ciudadDestino", 
        "=", $request->destino)->first();
        Viajes::where("id_viaje", "=", $request->id_viaje)->update(["id_chofer"=> $request->id_chofer,
        "id_combi" => $request->id_combi, "id_ruta" => $aux->id_ruta, "precio"=> $request->precio,
         "descripcion"=> $request->descripcion, "fecha" => $request->fecha, "hora" => $request->hora]);
        $id_viaje = $request->id_viaje;
        $insumos = Viaje_insumos::select("id_insumos")->where("viaje_insumo.id_viaje", "=", $request->id_viaje)->get();
        return view('admin.viajes.deleteInsumosViajes', compact('id_viaje', 'insumos'));
    }
    public function createviaje(Request $request){
        $ciudades = Ciudades::where("disponible",1)->get();
        $combis = $this->createviajecombidisponible($request);
        $choferes = $this->createviajechoferdisponible($request);
        $fecha = $request->fechaValidation;
        return view('admin.viajes.createViaje', compact('ciudades','combis','choferes','fecha'));
    }

    public function filtrardatosviaje(){
        return view('admin.viajes.inputFechaViaje');
        
    }
    private function createviajecombidisponible($request){
        $fecha = $request->fechaValidation;
        $combis = Combis::whereNotExists(function ($query) use ($fecha) {
            $query->select(DB::raw(1))
                  ->from('viajes')
                  ->whereColumn( "viajes.id_combi","=", "combis.id_combi")
                  ->when($fecha, function ($query, $fecha){
                      return $query->where("viajes.fecha","=", $fecha);
                  });
        })
        ->get();
        return $combis;
    }
    private function createviajechoferdisponible($request){
        $fecha = $request->fechaValidation;
        $choferes = Usuarios::whereNotExists(function ($query) use ($fecha){
            $query->select(DB::raw(1))
            ->from('viajes')
            ->whereColumn('viajes.id_chofer',"=", 'usuarios.id_usuario')
            ->when($fecha,function($query, $fecha){
                return $query->where("viajes.fecha", "=", $fecha);
            });
        })
        ->get();
        return $choferes;
    }

    public function createviajeprocess(viajesRequest $request){
        $viaje = new Viajes();
        $this->createviajeprocess_ruta($request);
        $aux = Rutas::select("id_ruta")->where("id_ciudadOrigen", "=", $request->origen, "and", "id_ciudadDestino","=", $request->destino)
        ->get();
        $viaje->id_ruta = $aux[0]->id_ruta;  
        $viaje->id_chofer = $request->id_chofer;
        $viaje->id_combi = $request->id_combi;
        $viaje->precio = $request->precio;
        $viaje->fecha = $request->fecha;
        $viaje->hora = $request->hora;
        $viaje->save();
        $idviaje = Viajes::select("viajes.id_viaje")->where("viajes.fecha", "=" ,$request->fecha, "and", "viajes.id_chofer", "=", 
        $request->id_chofer)->first();
        $insumos = Insumos::select("id_insumos","nombre")->get();
        return view('admin.viajes.insumosViajes', compact('idviaje', 'insumos'));
    }
    private function createviajeprocess_ruta($request){
        $found = Rutas::where("id_ciudadOrigen","=",$request->origen,"and","id_ciudadDestino","=", $request->destino)->get();
        if($found->count() == 0){    
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

    public function deleteviajes(Request $request){
        $found = Viajes::select('id_viaje')->where('id_viaje',$request->id_viaje)->get();
        if($found->isNotEmpty()){
            Viajes::where('id_viaje',$request->id_viaje)->delete();
            return redirect()->route('homeEmp')->withErrors(['sucess'=>'el viaje se elimino correctamente']);
        }
        return redirect()->route('homeEmp')->withErrors(['sucess'=>'ocurrio un problema']);
    }
}
