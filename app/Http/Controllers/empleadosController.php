<?php

namespace App\Http\Controllers;

use App\Http\Requests\empleadosRequest;
use App\Models\Usuarios;
use App\Models\Viajes;
use Illuminate\Http\Request;

class empleadosController extends Controller
{

    public function showEmp (){
        $Choferes = Usuarios::select('id_usuario','nombre','apellido','dni','email','contraseña')->where('id_permiso','2')->get();
        $Admin = Usuarios::select('id_usuario','nombre','apellido','dni','email','contraseña')->where('id_permiso','3')->get();
        return view('admin.empleados.homeEmp',compact('Choferes','Admin'));
    }

    public function createEmp (){
        return view('admin.empleados.createEmp');
    }

    public function saveReg (empleadosRequest $request){
      $query = Usuarios::where('dni','=', $request->dni);
      if($query->count() == 0 ){    

        $reg = new Usuarios;
        $reg->nombre = $request->nombre;
        $reg->apellido = $request->apellido;
        $reg->dni = $request->dni;
        $reg->id_permiso = $request->rol;
        $reg->email = $request->email;
        $reg->contraseña = $request->contraseña;
        $reg->save();
        return redirect()->route('homeEmp')->withErrors(['sucess'=>'usuario creado con exito']);
      } else {
        return redirect()->route('homeEmp')->withErrors(['sucess'=>'usuario ya registrado con dni']);
       
      }
    }

    public function updateEmp (Request $request){
        $usuario =  Usuarios::where('id_usuario','=',$request->id_usuario)->get();
        return view('admin.empleados.updateEmp',compact('usuario'));
    }

    public function saveEmp(Request $request){

        if (($request->nombre == null)or($request->apellido == null)or($request->dni == null)or($request->email == null)or($request->contraseña == null) ) {
            
            return redirect()->route('homeEmp')->withErrors(['sucess'=>'error al modificar , hay campos vacios']);
        } else {
            $query = Usuarios::where('dni','=', $request->dni);
            $query1 = Usuarios::where('email','=', $request->email);
            if($query->count() == 0 and $query1->count() == 0){   
              Usuarios::where('email',$request->email)->update(["nombre"=> $request->nombre,
              "apellido" => $request->apellido,"dni" => $request->dni,"email" => $request->email,
              "contraseña" => $request->contraseña,]);
              return redirect()->route('homeEmp')->withErrors(['sucess'=>'se modificaron los datos correctamente']);
 
            } else {
                return redirect()->route('homeEmp')->withErrors(['sucess'=>'error, campo dni o email ya registrados']);
            }
        }
    }


    public function deleteEmp(Request $request){
        $found = Usuarios::select("id_usuario")->where("id_usuario", "=", $request->id_usuario)->get();
        $viaje = Viajes::select('id_viaje')->where('id_chofer',$request->id_usuario)->get();

        if($found->isNotEmpty() && $viaje->isEmpty()){
            Usuarios::where("id_usuario", $request->id_usuario)->delete();
            return redirect()->route('homeEmp')->withErrors(['sucess'=>'el empleado se elimino correctamente']);
        }
        return redirect()->route('homeEmp')->withErrors(['sucess'=>'el empleado chofer no  se pudo eliminar , esta asignado a un viaje']);
    }

}