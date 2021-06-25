<?php

namespace App\Http\Controllers;

use App\Http\Requests\choferRequest;
use App\Models\Usuarios;
use App\Models\Viajes;
use Illuminate\Http\Request;

class choferController extends Controller
{
   public function homeChofer(){
        $viajesToday = Viajes::join("usuarios","usuarios.id_usuario", "=", "viajes.id_chofer")
        ->join("rutas", "rutas.id_ruta", "=", "viajes.id_ruta")
        ->join("combis", "combis.id_combi", "=", "viajes.id_combi")
        ->join("categorias", "categorias.id_categoria", "=", "combis.id_categoria")
        ->join("ciudades", "ciudades.id_ciudad", "=", "rutas.id_ciudadOrigen")
        ->join("ciudades as c2", "c2.id_ciudad", "=", "rutas.id_ciudadDestino")
        ->select("viajes.id_viaje","viajes.fecha", "viajes.hora", 
        "viajes.precio", "ciudades.nombre as origen", "c2.nombre as destino",
         "combis.patente", "viajes.estado")
        ->where("viajes.id_chofer", "=", session('id_usuario'))
        ->where("viajes.estado", "Pendiente")
        ->where("viajes.fecha","=", date('Y-m-d'))
        ->get();
       return view('chofer.homeChofer', compact('viajesToday'));
   }
   
   public function updateChofer (){
    $usuario =  Usuarios::where('id_usuario','=',session('id_usuario'))->get();
    return view('chofer.updatePerfilChofer',compact('usuario'));
    }

    public function updateChoferProcess(choferRequest $request){
        if($this->newEmail($request)){
            if($this->updateEmail($request)==0){
                return redirect()->route('updateChofer')->withErrors(['error'=>'Ya hay otra cuenta registrada con el mismo email, intente con otra']);
            }
        }
        Usuarios::where('id_usuario',session('id_usuario'))->update(["nombre" => $request->nombre, "apellido" => $request->apellido]);
        session(['email'=>$request->email]); 
        return redirect()->route('updateChofer')->withErrors(['sucess'=>'Perfil actualizado correctamente']);
    }
    private function newEmail($request){
        if(session('email') == $request->email){
            return false;
        }     
        return true;
    }
    private function updateEmail($request){
        $found = Usuarios::where('email', $request->email)->get();
        if($found->count()==0){
            Usuarios::where('id_usuario',session('id_usuario'))->update(["email" => $request->email]);
            return true;
        }
        return false;
    }

    public function misViajesChofer(){
        $viajes = Viajes::join("usuarios","usuarios.id_usuario", "=", "viajes.id_chofer")
        ->join("rutas", "rutas.id_ruta", "=", "viajes.id_ruta")
        ->join("combis", "combis.id_combi", "=", "viajes.id_combi")
        ->join("categorias", "categorias.id_categoria", "=", "combis.id_categoria")
        ->join("ciudades", "ciudades.id_ciudad", "=", "rutas.id_ciudadOrigen")
        ->join("ciudades as c2", "c2.id_ciudad", "=", "rutas.id_ciudadDestino")
        ->select("viajes.id_viaje","viajes.fecha", "viajes.hora", 
        "viajes.precio", "ciudades.nombre as origen", "c2.nombre as destino",
         "combis.patente","combis.modelo","combis.color","combis.cant_asientos", "viajes.estado")
        ->where("viajes.id_chofer", "=", session('id_usuario'))
        ->get();
        return view('chofer.misViajesChofer',compact('viajes'));
    }

   public function finalizarViaje(Request $request){
       $query = Viajes::where("viajes.id_viaje","=",$request->id_viaje)
       ->where("viajes.estado","=","FINALIZADO" )->get();
       if($query->count() == 0 ){
          Viajes::where("viajes.id_viaje","=",$request->id_viaje)->update(["estado"=> "FINALIZADO"]);
          return redirect()->route('misViajesChofer')->withErrors(['error'=>'se finalizo el viaje correctamente']);
       } else {
        return redirect()->route('misViajesChofer')->withErrors(['error'=>'el viaje ya se encuentra finalizado']);

       }
       

   }



   public function listarPasajeros(Request $request){
    $pasajeros = Usuarios::join("pasajes","pasajes.id_usuario", "=", "usuarios.id_usuario")
    ->select( "pasajes.id_pasaje","usuarios.id_usuario","usuarios.nombre", "usuarios.apellido", 
    "usuarios.dni")
    ->where("pasajes.id_viaje", "=", $request->id_viaje)->get();

    return view('chofer.listarPasajeros',compact('pasajeros'));

   }


   public function viajesFinalizados(){
    $viajes = Viajes::join("usuarios","usuarios.id_usuario", "=", "viajes.id_chofer")
    ->join("rutas", "rutas.id_ruta", "=", "viajes.id_ruta")
    ->join("combis", "combis.id_combi", "=", "viajes.id_combi")
    ->join("categorias", "categorias.id_categoria", "=", "combis.id_categoria")
    ->join("ciudades", "ciudades.id_ciudad", "=", "rutas.id_ciudadOrigen")
    ->join("ciudades as c2", "c2.id_ciudad", "=", "rutas.id_ciudadDestino")
    ->select("viajes.id_viaje","viajes.fecha", "viajes.hora", 
    "viajes.precio", "ciudades.nombre as origen", "c2.nombre as destino",
     "combis.patente","combis.modelo","combis.color","combis.cant_asientos", "viajes.estado")
    ->where("viajes.id_chofer", "=", session('id_usuario'))
    ->where("viajes.estado","=","FINALIZADO" )
    ->get();
    return view('chofer.viajesFinalizados',compact('viajes'));
      
   }









}

