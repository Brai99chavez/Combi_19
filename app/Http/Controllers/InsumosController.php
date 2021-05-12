<?php

namespace App\Http\Controllers;

use App\Http\Requests\insumosRequest;
use App\Models\Insumos;
use App\Models\Viaje_insumos;
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
        $found = Insumos::select("insumos.id_insumos")->where("insumos.id_insumos", "=", $request->id_insumo)->get();
        if($found->isNotEmpty()){
            Viaje_insumos::where("viaje_insumo.id_insumo", "=", $request->id_insumo, "and", "viaje_insumo.created_at", ">", "getdate()")->delete();
            Insumos::where("insumos.id_insumos","=", $request->id_insumo)->delete();
        }
    }
    
    public function showinsumo(insumosRequest $request){
        $insumo = new Insumos();
        $insumo->nombre = $request->nombre;
        $insumo->precio = $request->precio;
        $insumo->descripcion = $request->descripcion;
        $insumo->disponible = $request->disponible;
        $insumo->save();
        $insumosDisponibles = Insumos::where("insumos.disponible", "=", 1)->get();
        $insumosBaja = Insumos::where("insumos.disponible", "=", 0)->get();
        return view('admin.insumos.homeInsumos', compact('insumosDisponibles', 'insumosBaja'));
    }
    public function updateinsumos(Request $request){
        $insumo = Insumos::where("insumos.id_insumos","=",$request->id_insumo)->get();
        return view('admin.insumos.updateInsumos', compact('insumo'));
    }


    public function updateinsumos1(Request $request ){

     Insumos::where("id_insumos", "=", $request->id_insumos)->update(["nombre"=> $request->nombre,
     "precio"=> $request->precio, "descripcion"=> $request->descripcion, "disponible"=> $request->disponible]);
      return redirect()->route('homeinsumos')->withErrors(['updateprocess'=>'Membresia modificada correctamente']);
    }
      


}