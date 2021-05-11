<?php

namespace App\Http\Controllers;

use App\Models\Insumos;
use Illuminate\Http\Request;

class InsumosController extends Controller
{
    public function homeinsumos(){
        $insumos = Insumos::all();
        return view('admin.insumos.homeInsumos', compact('insumos'));
    }
    public function createinsumo(){
        return view('admin.insumos.createInsumo');
    }
    public function deleteinsumos(){
        return view('admin.insumos.deleteInsumos');
    }
    public function showinsumo(Request $request){
        $insumo = new Insumos();
        $insumo->nombre = $request->nombre;
        $insumo->precio = $request->precio;
        $insumo->descripcion = $request->descripcion;
        $insumo->disponible = $request->disponible;
        $insumo->save();
        if($request->disponible == 1){
            $dis = 'SI';
        }else{
            $dis = 'NO';
        }
        return view('admin.insumos.showInsumo', compact('insumo', 'dis'));
    }
    public function updateinsumos($id_insumo){
        $insumo = Insumos::where("insumos.id_insumos", $id_insumo)->get();
        return view('admin.insumos.updateInsumos', compact('insumo'));
    }
}