<?php

namespace App\Http\Controllers;

use App\Http\Requests\choferRequest;
use App\Models\Pasajes;
use App\Models\RegistrosCOVID;
use App\Models\Sintomas;
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
        ->where("viajes.estado","<>","Finalizado")
        ->get();
        return view('chofer.misViajesChofer',compact('viajes'));
    }

   public function finalizarViaje(Request $request){
        Viajes::where('id_viaje',$request->id_viaje)->update(["estado"=> "Finalizado"]);
        return redirect()->route('misViajesChofer')->withErrors(['success'=>'Viaje Finalizado']);
   }
   public function iniciarViaje(Request $request){
        Viajes::where('id_viaje',$request->id_viaje)->update(["estado"=> "Salio"]);
        Pasajes::where('id_viaje',$request->id_viaje)->where('estado','=',"Pendiente")->update(["estado" => "Ausente"]);
        return redirect()->route('misViajesChofer')->withErrors(['success'=>'Viaje Iniciado']);
   }
   public function cancelarViaje(Request $request){
        Viajes::where('id_viaje',$request->id_viaje)->update(["estado"=> "Cancelado"]);
        Pasajes::where('id_viaje',$request->id_viaje)->where('estado','=',"Pendiente")->update(["estado" => "Cancelado EMPRESA", "reembolsar" => "SI"]);
        return redirect()->route('misViajesChofer')->withErrors(['success'=>'Viaje Cancelado']);
    }


   public function listarPasajeros(Request $request){
    $pasajeros = Usuarios::join("pasajes","pasajes.id_usuario", "=", "usuarios.id_usuario")
    ->select( "usuarios.id_usuario","usuarios.nombre", "usuarios.apellido", 
    "usuarios.dni","pasajes.estado")
    ->where("pasajes.id_viaje","=", $request->id_viaje)
    ->where("pasajes.estado","<>","Ausente")->get();
    $fecha = Viajes::where('id_viaje',$request->id_viaje)->select('fecha')->get();
    $id_viaje = $request->id_viaje;
    return view('chofer.listarPasajeros',compact('pasajeros','fecha','id_viaje'));

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
    ->where("viajes.estado","=","Finalizado" )
    ->get();
    return view('chofer.viajesFinalizados',compact('viajes'));
      
   }

   public function registrarSintomasCovid(Request $request){
    $id_pasajero = $request->id_usuario;
    $id_viaje = $request->id_viaje;
    $sintomas = Sintomas::all();
    return view('chofer.registrarSintomas',compact('id_pasajero','sintomas','id_viaje'));
   }

   public function registrarSintomasProcess(Request $request){
    if(isset($request->sintomas)){ 
        for($i = 0; $i < count($request->sintomas); $i++){
            $registro = new RegistrosCOVID;
            $registro->id_viaje = $request->id_viaje;
            $registro->id_sintoma = $request->sintomas[$i];
            $registro->id_usuario = $request->id_usuario;
            $registro->save();
        }
        Pasajes::where('id_viaje',$request->id_viaje)->where('id_usuario',$request->id_usuario)->update(['estado' => "Cancelado COVID", "reembolsar" => "SI"]);
        return $this->listarPasajeros($request);
    }
    Pasajes::where('id_viaje',$request->id_viaje)->where('id_usuario',$request->id_usuario)->update(['estado' => "Confirmado"]);
    return $this->listarPasajeros($request);
   }









}

