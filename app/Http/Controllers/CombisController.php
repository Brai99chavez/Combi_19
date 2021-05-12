<?php

namespace App\Http\Controllers;

use App\Http\Requests\combisRequest;
use App\Models\Categorias;
use App\Models\Combis;
use Illuminate\Http\Request;
class CombisController extends Controller
{
    public function homecombis(){
        $combis = Combis::all();
        return view('admin.combis.homeCombis', compact('combis'));
    }
    public function createcombis(){
        $cat = Categorias::select("nombre");
        return view('admin.combis.createCombis', compact('cat'));
    }
    public function createcombisprocess(combisRequest $request){
        $new = new Combis;
        $new->patente = $request->patente;
        $new->modelo = $request->modelo;
        $new->color = $request->color;
        $new->cant_asientos = $request->cant_asientos;
        $new->id_categoria = $request->id_categoria;
        $new->disponible = $request->disponible;
        $new->save();
        return view('admin.combis.homeCombis');    
    }
}
