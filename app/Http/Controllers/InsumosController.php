<?php

namespace App\Http\Controllers;

use App\Http\Requests\insumosRequest;
use App\Models\Insumos;
use App\Models\Viaje_insumos;
use App\Models\Viajes;
use Illuminate\Http\Request;

class InsumosController extends Controller
{
    public function homeinsumos(){
        $insumosDisponibles = Insumos::where("insumos.disponible", "=", 1)->get();
        $insumosBaja = Insumos::where("insumos.disponible", "=", 0)->get();
        return view('admin.insumos.homeInsumos', compact('insumosDisponibles', 'insumosBaja'));
    }
    public function createinsumo(){
        return view('admin.insumos.createInsumo');
    }

    public function deleteinsumos(Request $request){
        $found = Viaje_insumos::join('viajes','viajes.id_viaje','=','viaje_insumo.id_viaje')->where('id_insumo',$request->id_insumo)
        ->where('viajes.fecha','>=',date('Y-m-d'))->get();
        if($found->count()==0){
            Viaje_insumos::where("viaje_insumo.id_insumo", "=", $request->id_insumo, "and", "viaje_insumo.created_at", ">", "getdate()")->delete();
            Insumos::where("insumos.id_insumos","=", $request->id_insumo)->delete();
            return redirect()->route('homeinsumos')->withErrors(['alert'=>'El insumo se elimino correctamente']);
        }
        return redirect()->route('homeinsumos')->withErrors(['alert'=>'El insumo no se pudo eliminar, esta asignado a un viaje']);
    }
    
    public function showinsumo(insumosRequest $request){
      $query = Insumos::where('nombre', $request->nombre);
      if($query->count() == 0 ){  
        $insumo = new Insumos();
        $insumo->nombre = $request->nombre;
        $insumo->precio = $request->precio;
        $insumo->descripcion = $request->descripcion;
        $insumo->disponible = $request->disponible;
        $insumo->save();
        $insumosDisponibles = Insumos::where("insumos.disponible", "=", 1)->get();
        $insumosBaja = Insumos::where("insumos.disponible", "=", 0)->get();
        return redirect()->route('homeinsumos', compact('insumosDisponibles', 'insumosBaja'))->withErrors(['alert'=>'Insumo creado correctamente']);
      } else {
        return redirect()->route('homeinsumos')->withErrors(['alert'=>'error, insumo con nombre ya registrado']);
      }
    }

    public function updateinsumos(Request $request){
        $insumo = Insumos::where("insumos.id_insumos","=",$request->id_insumo)->get();
        return view('admin.insumos.updateInsumos', compact('insumo'));
    }


    public function updateinsumos1(Request $request ){
      $request->validate([
        'nombre' => 'required|max:40',
        'precio' => 'required'
      ],['nombre.unique' => 'El nombre debe tener menos de 40 caracteres', 'required' => 'No puede haber campos vacios']);
      if($this->newNombre($request)){
        if($this->validateNewNombre($request)==0){
          return redirect()->route('homeinsumos')->withErrors(['alert'=>'El nombre ingresado del insumo ya se encuentra registrado']); 
        }
      }    
      Insumos::where("id_insumos",$request->id_insumos)->update(["nombre" => $request->nombre,"precio"=> $request->precio,
       "descripcion"=> $request->descripcion, "disponible"=> $request->disponible]);
      return redirect()->route('homeinsumos')->withErrors(['alert'=>'Insumo modificada correctamente']);
    }
    private function newNombre($request){
      $found = Insumos::where('id_insumos',$request->id_insumos)->get();
      if($found[0]->nombre <> $request->nombre){
        return true;
      }
      return false;
    }
    private function validateNewNombre($request){
      $found = Insumos::Where('nombre',$request->nombre)->get();
      if($found->count()==0){
        return true;
      }
      return false;
    }

}