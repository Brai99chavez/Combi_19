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
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\PseudoTypes\True_;

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
        "viajes.precio as precio", "ciudades.nombre as origen", "c2.nombre as destino","viajes.fecha",'viajes.hora',
        'viajes.estado','viajes.cantPasajes')
        ->get();
        $viaje_insumos = Viaje_insumos::join("viajes","viajes.id_viaje","=","viaje_insumo.id_viaje")
        ->join("insumos","insumos.id_insumos","=","viaje_insumo.id_insumo")
        ->select("insumos.nombre","viajes.id_viaje")->get();
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
        "viajes.precio", "ciudades.nombre as origen", "c2.nombre as destino","usuarios.nombre as chofer",
         "combis.patente as combi", "viajes.estado", "viajes.cantPasajes")
        ->where("viajes.id_viaje", "=", $request->id_viaje)
        ->get(); 
        $ciudades = Ciudades::where("disponible",1)->get();
        $Combis = $this-> createviajecombidisponible($viaje[0]->fecha);
        $Choferes = $this->createviajechoferdisponible($viaje[0]->fecha);
        return view("admin.viajes.updateViajes", compact('viaje','ciudades','Choferes','Combis'));
    }
    public function updateviajesprocess(Request $request){
        $request->validate([
            'precio' => 'required|numeric',
            'fecha' => 'required|after_or_equal:ladeHoy',
            'cantPasajes' => 'required|numeric|gte:0',
            'estado' => 'required'
        ],['cantPasajes.numeric' => 'La cantidad de pasajes ingresada es invalida',
            'cantPasajes.gte' => 'El valor ingresado de pasajes es incorrecto',
            'required' => 'Los campos no puede ser estar vacios']);
        if($request->fecha <> $request->fechaactual){
            if($this->validationupdatefecha($request)==0){
                return redirect()->route('homeviajes')->withErrors(['sucess'=>'El chofer o la combi ingresada no esta disponible en la nueva fecha']); 
            }
        }
        $this->createviajeprocess_ruta($request);
        $aux = Rutas::select("rutas.id_ruta")->where("rutas.id_ciudadOrigen", "=", $request->origen)->where("rutas.id_ciudadDestino", 
        "=", $request->destino)->first();
        Viajes::where("id_viaje", "=", $request->id_viaje)->update(["id_chofer"=> $request->id_chofer,
        "id_combi" => $request->id_combi, "id_ruta" => $aux->id_ruta, "precio"=> $request->precio, "fecha" => $request->fecha,
        "hora" => $request->hora, "cantPasajes" => $request->cantPasajes, "estado" => $request->estado]);
        return redirect()->route('homeviajes')->withErrors(['sucess'=>'La actualizacion se realizo correctamente']);
    }
    private function validationupdatefecha($request){
        $foundCombi = Combis::whereExists(function ($query) use ($request) {
            $query->select(DB::raw(1))
                  ->from('viajes')
                  ->whereColumn( "viajes.id_combi","=", "combis.id_combi")
                  ->when($request, function ($query, $request){
                      return $query->where("viajes.fecha","=", $request->fecha)->where("viajes.id_combi","=", $request->id_combi);
                  });
        })
        ->get();
        $foundChofer = Usuarios::whereExists(function ($query) use ($request){
            $query->select(DB::raw(1))
            ->from('viajes')
            ->whereColumn('viajes.id_chofer',"=", 'usuarios.id_usuario')
            ->when($request,function($query, $request){
                return $query->where("viajes.fecha", "=", $request->fecha)->where("viajes.id_chofer", "=", $request->id_chofer);
            });
        })
        ->get();
        if(($foundCombi->count() ==0) && ($foundChofer->count() ==0)){  
            return 1;
        }
        return 0;
    }
    public function createviaje(Request $request){
        $request->validate([
            'fecha' => 'required|after_or_equal:ladeHoy'
        ]);
        $fecha = $request->fecha;
        $ciudades = Ciudades::where("disponible",1)->get();
        $combis = $this->createviajecombidisponible($fecha);
        $choferes = $this->createviajechoferdisponible($fecha);
        $cantchoferes = 0;
        return view('admin.viajes.createViaje', compact('ciudades','combis','choferes','fecha'));
    }

    
    public function filtrardatosviaje(){
        return view('admin.viajes.inputFechaViaje');
    }
    private function createviajecombidisponible($fecha){
        return Combis::whereNotExists(function ($query) use ($fecha) {
            $query->select(DB::raw(1))
                  ->from('viajes')
                  ->whereColumn( "viajes.id_combi","=", "combis.id_combi")
                  ->when($fecha, function ($query, $fecha){
                      return $query->where("viajes.fecha","=", $fecha);
                  });
        })
        ->get();
    }
    private function createviajechoferdisponible($fecha){
        $aux = Usuarios::whereNotExists(function ($query) use ($fecha){
            $query->select(DB::raw(1))
            ->from('viajes')
            ->whereColumn('viajes.id_chofer',"=", 'usuarios.id_usuario')
            ->when($fecha,function($query, $fecha){
                return $query->where("viajes.fecha", "=", $fecha);
            });
        })
        ->get();
        return $aux->where('id_permiso', 2);
    }

    public function createviajeprocess(viajesRequest $request){
        $viaje = new Viajes();
        $this->createviajeprocess_ruta($request);
        $aux = Rutas::select("id_ruta")->where("id_ciudadOrigen", "=", $request->origen)->where( "id_ciudadDestino","=", $request->destino)
        ->get();
        $viaje->id_ruta = $aux[0]->id_ruta;  
        $viaje->id_chofer = $request->id_chofer;
        $viaje->id_combi = $request->id_combi;
        $viaje->precio = $request->precio;
        $viaje->fecha = $request->fecha;
        $viaje->hora = $request->hora;
        $cant = Combis::select('cant_asientos')->where('id_combi',$request->id_combi)->get();
        $viaje->cantPasajes = $cant[0]->cant_asientos;
        $viaje->estado = "Pendiente";
        $viaje->save();
        $idviaje = Viajes::select("id_viaje")->where("viajes.fecha", "=" ,$request->fecha)->where( "viajes.id_chofer", "=", 
        $request->id_chofer)->get();
        $insumos = Insumos::select("id_insumos","nombre")->where("disponible",1)->get();
        return view('admin.viajes.insumosViajes', compact('idviaje', 'insumos'));
    }
    private function createviajeprocess_ruta($request){
        $found = Rutas::where('id_ciudadOrigen',$request->origen)->where('id_ciudadDestino',$request->destino)->get();
        if($found->count() == 0){    
            $rutaNew = new Rutas;
            $rutaNew->id_ciudadOrigen = $request->origen;
            $rutaNew->id_ciudadDestino = $request->destino;
            $rutaNew->save();
        }
        return 0;
    }
    public function createviajeprocess_insumos(Request $request){
        if(isset($request->insumo)){ 
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
        $found = Viajes::where('id_viaje',$request->id_viaje)->where('fecha','<',date('Y-m-d'))->get();
        if($found->count() == 0){
            Viaje_insumos::where('id_viaje',$request->id_viaje)->delete();
            Viajes::where('id_viaje',$request->id_viaje)->delete();
            return redirect()->route('homeviajes')->withErrors(['sucess'=>'el viaje se elimino correctamente']);
        }
        return redirect()->route('homeviajes')->withErrors(['sucess'=>'El viaje no puede ser eliminado porque es un viaje finalizado']);
    }
    public function editinsumosviaje(Request $request){
        $insumos = Viaje_insumos::join("insumos", "id_insumos", "=" ,"id_insumo")
                ->where("id_viaje",$request->id_viaje)
                ->select("id_insumo","nombre")
                ->get();
        $id_viaje = $request->id_viaje;
        return view('admin.viajes.updateInsumosViajes', compact('insumos','id_viaje'));
    }
    public function editinsumosviaje_process(Request $request){
        if(isset($request->insumo)){ 
            for($i = 0; $i < count($request->insumo); $i++){
                Viaje_insumos::where('id_viaje',$request->id_viaje)
                ->where('id_insumo',$request->insumo[$i])
                ->delete();
            }
            return redirect()->route('homeviajes')->withErrors(['sucess' => 'Los insumos han sido modificados']);
        }
        return redirect()->route('homeviajes')->withErrors(['sucess' => 'No se realizaron cambios en los insumos']);
    }
    public function addInsumos(Request $request){
        $insumos = Insumos::whereNotExists(function ($query) use ($request){
            $query->select(DB::raw(1))
            ->from('viaje_insumo')
            ->whereColumn('id_insumo',"=", 'id_insumos')
            ->when($request,function($query, $request){
                return $query->where("viaje_insumo.id_viaje", "=", $request->id_viaje);
            });
        })
        ->get();
        $insumosDisponibles = $insumos->where('disponible',1);
        $id_viaje = $request->id_viaje;
        return view('admin.viajes.addInsumos',compact('insumosDisponibles','id_viaje'));
    }
    public function addInsumos_process(Request $request){
        if(isset($request->insumo)){ 
            for($i = 0; $i < count($request->insumo); $i++){
                $nuevoInsumo = new Viaje_insumos;
                $nuevoInsumo->id_viaje = $request->id_viaje;
                $nuevoInsumo->id_insumo = $request->insumo[$i];
                $nuevoInsumo->save();
            }
            return redirect()->route('homeviajes')->withErrors(['sucess' => 'Los nuevos insumos han sido agregados']);
        }
        return redirect()->route('homeviajes')->withErrors(['sucess' => 'No se realizaron cambios en los insumos']);        
    }
}
