<?php

namespace App\Http\Controllers;

use App\Http\Requests\combisRequest;
use App\Models\Categorias;
use App\Models\Combis;
use App\Models\Viajes;
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
        $found = Combis::where('patente', $request->patente);
        if($found->count() == 0){
            $new = new Combis; 
            $new->patente = $request->patente;
            $new->modelo = $request->modelo;
            $new->color = $request->color;
            $new->cant_asientos = $request->cant_asientos;
            $new->id_categoria = $request->id_categoria;
            $new->disponible = $request->disponible;
            $new->save();
            return redirect()->route('homecombis')->withErrors(['sucess'=>'Combi creada correctamente']);    
        }
        return redirect()->route('homecombis')->withErrors(['sucess'=>'Ya existe una combi con la patente ingresada']); 
    }

    public function updateCombi(Request $request){
        $combi = Combis::select('id_combi','patente','modelo','color','cant_asientos','id_categoria')->where('id_combi',$request->id_combi)->get();
        return view('admin.combis.updateCombis',compact('combi'));
    }
    
    public function updateCombiProcess(combisRequest $request){
        $found = Combis::where('patente', $request->patente);
        if($found->count() == 0){ 
            Combis::where('id_combi',$request->id_combi)->update(["patente"=> $request->patente,
            "modelo" => $request->modelo,"color" => $request->color,"cant_asientos" => $request->cant_asientos,
            "id_categoria" => $request->id_categoria]);
            return redirect()->route('homecombis')->withErrors(['sucess'=>'Se modificaron los datos correctamente']);
        } else {
            return redirect()->route('homecombis')->withErrors(['sucess'=>'No se puedo actualizar, patente ya registrada']);
        } 
    }

    public function deleteCombi (Request $request){
        $found = Viajes::where('id_combi', $request->id_combi)->get();
        if($found->count()==0){
            Combis::where("id_combi", $request->id_combi)->delete();
            return redirect()->route('homecombis')->withErrors(['sucess'=>'La combi se elimino correctamente']);
        }
        return redirect()->route('homecombis')->withErrors(['sucess'=>'La combi no se pudo eliminar , esta asignado a un viaje']);
    }
}
