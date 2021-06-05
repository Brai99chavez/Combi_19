<?php

namespace App\Http\Controllers;

use App\Http\Requests\ciudadesRequest;
use App\Models\Ciudades;
use App\Models\Rutas;
use App\Models\Viajes;
use Illuminate\Http\Request;

class ciudadesController extends Controller
{
    public function showCiudades (){
        $ciudades = Ciudades::select('id_ciudad','nombre','direccion','disponible')->get();
        return view('admin.ciudades.homeCiudades',compact('ciudades'));
    }
    public function createciudades(){
        return view('admin.ciudades.createCiudades');
    }
    public function createciudadesprocess(ciudadesRequest $request){
        $new = new Ciudades();
        $found = Ciudades::where("nombre", $request->nombre);
        if($found->count() == 0){ 
            $new->nombre = $request->nombre;
            $new->direccion = $request->direccion;
            $new->disponible = $request->disponible;
            $new->save();
            return redirect()->route('homeciudades')->withErrors(['sucess'=>'Ciudad creada correctamente']);    
        }
        return redirect()->route('homeciudades')->withErrors(['sucess'=>'Ya existe una ciudad con la patente ingresada']); 
    }

    
    public function updateCiudad(Request $request){
        $ciudades = Ciudades::select('id_ciudad','nombre','direccion','disponible')->where('id_ciudad',$request->id_ciudad)->get();
       
        return view('admin.ciudades.updateCiudades',compact('ciudades'));
    }
    
    public function updateCiudadProcess(Request $request){
        if (($request->nombre == null)or($request->direccion == null)or($request->disponible == null)) {
            return redirect()->route('homeciudades')->withErrors(['sucess'=>'error al modificar , hay campos vacios']);
        } else {                     
            $found = Ciudades::where("nombre", $request->nombre);
            if($found->count() == 0){ 
              Ciudades::where('id_ciudad',$request->id_ciudad)->update(["nombre"=> $request->nombre,
              "direccion" => $request->direccion,"disponible" => $request->disponible]);
              return redirect()->route('homeciudades')->withErrors(['sucess'=>'se modificaron los datos correctamente']);
        
            } else {
                return redirect()->route('homeciudades')->withErrors(['sucess'=>'error al modificar , nombre ya registrado']);
            }
        }
    }

    public function deleteCiudad (Request $request){
        $found = Ciudades::select("id_ciudad")->where("id_ciudad", $request->id_ciudad)->get();
        if($found->isNotEmpty()){
            Ciudades::where("id_ciudad", $request->id_ciudad)->delete();
            return redirect()->route('homeciudades')->withErrors(['sucess'=>'la ciudad se elimino correctamente']);
        }
        return redirect()->route('homeciudades')->withErrors(['sucess'=>'la ciudad no  se pudo eliminar , esta asignado a un viaje']);
    }

}
