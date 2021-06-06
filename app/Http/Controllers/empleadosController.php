<?php

namespace App\Http\Controllers;

use App\Http\Requests\empleadosRequest;
use App\Models\Usuarios;
use App\Models\Viajes;
use Carbon\Carbon;
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

    public function saveEmp(empleadosRequest $request){
        if($this->newsEmailorDNI($request)==1){
            if($this->validationEmailDNI($request)==0){
                return redirect()->route('homeEmp')->withErrors(['sucess'=>'Error, campo dni o email ya registrados']);    
            }
        }
        Usuarios::where('email',$request->email)->update(["nombre"=> $request->nombre,
        "apellido" => $request->apellido,"dni" => $request->dni,"email" => $request->email,
        "contraseña" => $request->contraseña]);
        return redirect()->route('homeEmp')->withErrors(['sucess'=>'Se modificaron los datos correctamente']);       
    }
    private function newsEmailorDNI($request){
        $usuarioActual = Usuarios::where('id_usuario', $request->id_usuario)->get();
        if($usuarioActual[0]->email <> $request->email || $usuarioActual[0]->dni <> $request->dni){
            return 1;
        }     
        return 0;
    }
    private function validationEmailDNI($request){
        $found = Usuarios::where('email', $request->email)->get();
        $found2 = Usuarios::where('dni', $request->dni)->get();
        if($found->count() == 0 && $found2 == 0){
            return 1;
        }
        return 0;
    }
    public function deleteEmp(Request $request){
        $viaje = Viajes::select('id_viaje')
        ->where('id_chofer',$request->id_usuario)
        ->where('fecha','>=',date('Y-m-d'))
        ->get();
        if($viaje->count()==0){
            Usuarios::where("id_usuario", $request->id_usuario)->delete();
            return redirect()->route('homeEmp')->withErrors(['sucess'=>'el empleado se elimino correctamente']);
        }
        return redirect()->route('homeEmp')->withErrors(['sucess'=>'El empleado chofer no  se pudo eliminar, esta asignado a un viaje']);
    }
}