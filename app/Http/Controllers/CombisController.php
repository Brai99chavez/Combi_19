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
        return view('admin.combis.homeCombi', compact('combis'));
    }
    public function createcombis(){
        return view('admin.combis.createCombis');
    }
    public function createcombisprocess(combisRequest $request){
        $new = new Combis;
        $found = Combis::where("combis.patente", "=", $request->patente);
        if($found->count() == 0){ 
            $new->patente = $request->patente;
            $new->modelo = $request->modelo;
            $new->color = $request->color;
            $new->cant_asientos = $request->cant_asientos;
            $new->id_categoria = $request->id_categoria;
            $new->disponible = $request->disponible;
            $new->save();
            return redirect()->route('homecombis')->withErrors(['combiprocess'=>'Combi creada correctamente']);    
        }
        return redirect()->route('homecombis')->withErrors(['combiprocess'=>'Ya existe una combi con la patente ingresada']); 
    }
}
