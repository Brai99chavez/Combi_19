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
        if($this->validateNewNombre($request)){
            $new = new Ciudades(); 
            $new->nombre = $request->nombre;
            $new->direccion = $request->direccion;
            $new->disponible = $request->disponible;
            $new->save();
            return redirect()->route('homeciudades')->withErrors(['sucess'=>'Ciudad cargada correctamente']);    
        }
        return redirect()->route('homeciudades')->withErrors(['sucess'=>'La nombre de la ciudad ya existe']); 
    }

    
    public function updateCiudad(Request $request){
        $ciudades = Ciudades::select('id_ciudad','nombre','direccion','disponible')->where('id_ciudad',$request->id_ciudad)->get();
        return view('admin.ciudades.updateCiudades',compact('ciudades'));
    }
    
    public function updateCiudadProcess(ciudadesRequest $request){              
        if($this->newNombre($request)){
            if($this->validateNewNombre($request)==0){
                return redirect()->route('homeciudades')->withErrors(['sucess'=>'Error, el nombre ya esta registrado']);
            } 
            Ciudades::where('id_ciudad',$request->id_ciudad)->update(["nombre"=> $request->nombre,
            "direccion" => $request->direccion,"disponible" => $request->disponible]);
        return redirect()->route('homeciudades')->withErrors(['sucess'=>'Los datos han sido actualizados']);
        }
    }
    private function newNombre($request){
        $found = Ciudades::where('id_ciudad',$request->id_ciudad)->get();
        if($found[0]->nombre <> $request->nombre){
          return true;
        }
        return false;
      }
      private function validateNewNombre($request){
        $found = Ciudades::Where('nombre',$request->nombre)->get();
        if($found->count()==0){
          return true;
        }
        return false;
      }

    public function deleteCiudad (Request $request){
        $aux = Rutas::select('id_ruta')->where("id_ciudadDestino", $request->id_ciudad)->get();
        $aux2 = Rutas::select('id_ruta')->where("id_ciudadOrigen", $request->id_ciudad)->get();
        $idruta = $aux->union($aux2);
        if($idruta->count()>0){
            $found = Viajes::where('id_ruta', $idruta[0]->id_ruta)->get();
            if($found->count()>0){
                return redirect()->route('homeciudades')->withErrors(['sucess'=>'La ciudad no se pudo eliminar, esta asignado a un viaje']);
            }
            Rutas::where('id_ruta',$idruta[0]->id_ruta)->delete();
        }
        Ciudades::where("id_ciudad", $request->id_ciudad)->delete();     
        return redirect()->route('homeciudades')->withErrors(['sucess'=>'La ciudad se elimino correctamente']);
    }

}
