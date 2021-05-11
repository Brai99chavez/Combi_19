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

    }
    public function deleteinsumos(){

    }
    public function updateinsumos($id_insumo){
        $insumo = Insumos::where("insumos.id_insumos", $id_insumo)->get();
        return view('admin.insumos.updateInsumos', compact('insumo'));
    }
}