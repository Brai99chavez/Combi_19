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
            return redirect()->route('homeciudades')->withErrors(['combiprocess'=>'Combi creada correctamente']);    
        }
        return redirect()->route('homeciudades')->withErrors(['combiprocess'=>'Ya existe una combi con la patente ingresada']); 
    }

    public function updateCombi(Request $request){
        $combi = Combis::select('id_combi','patente','modelo','color','cant_asientos','id_categoria','disponible')->where('id_combi',$request->id_combi)->get();
        return view('admin.combis.updateCombis',compact('combi'));
    }
    
    public function updateCombiProcess(Request $request){
        if (($request->patente == null)or($request->modelo == null)or($request->color == null)or($request->cant_asientos == null)or($request->id_categoria == null)or ($request->disponible == null)) {
            return redirect()->route('homecombis')->withErrors(['sucess'=>'error al modificar , hay campos vacios']);
        } else {
            Combis::where('id_combi',$request->id_combi)->update(["patente"=> $request->patente,
            "modelo" => $request->modelo,"color" => $request->color,"cant_asientos" => $request->cant_asientos,
            "id_categoria" => $request->id_categoria,"disponible"=>$request->disponible]);
            return redirect()->route('homecombis')->withErrors(['sucess'=>'se modificaron los datos correctamente']);
        }
    }

    public function deleteCombi (Request $request){
        $found = Combis::select("id_combi")->where("id_combi", $request->id_combi)->get();

        if($found->isNotEmpty()){
            Combis::where("id_combi", $request->id_combi)->delete();
            return redirect()->route('homecombis')->withErrors(['sucess'=>'la combi se elimino correctamente']);
        }
        return redirect()->route('homecombis')->withErrors(['sucess'=>'la combi no  se pudo eliminar , esta asignado a un viaje']);
    }
}
