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
        $reg = new Usuarios;
        $reg->nombre = $request->nombre;
        $reg->apellido = $request->apellido;
        $reg->dni = $request->dni;
        $reg->id_permiso = $request->rol;
        $reg->email = $request->email;
        $reg->contraseña = $request->contraseña;
        $reg->save();
        return redirect()->route('homeEmp')->withErrors(['sucess'=>'Empleado cargado con exito']);
    }

    public function updateEmp (Request $request){
        $usuario =  Usuarios::where('id_usuario','=',$request->id_usuario)->get();
        return view('admin.empleados.updateEmp',compact('usuario'));
    }

    public function saveEmp(Request $request){
        $request->validate([
            'nombre'=>'required',
            'apellido'=>'required',
            'dni' => 'required|lt:999999999',
            'email' => 'required|email',
            'contraseña' => 'required',
        ],['required' => 'Los campos no pueden estar vacios','dni.lt' => 'DNI invalido' ]);
        Usuarios::where('id_usuario',$request->id_usuario)->update(["nombre"=> $request->nombre,
        "apellido" => $request->apellido,"contraseña" => $request->contraseña]);
        if($this->newsEmailorDNI($request)){
            if($this->updateEmailDNI($request)==0){
                if(session('id_permiso')==3){
                    return redirect()->route('homeEmp')->withErrors(['error'=>'Error, DNI o email ya registrados']);
                }else{
                    return redirect()->route('editarPerfilCliente')->withErrors(['sucess'=>'Error, DNI o email ya registrados']); 
                }
            }
        }
        if(session('id_permiso')==3){
            return redirect()->route('homeEmp')->withErrors(['sucess'=>'Se modificaron los datos correctamente']);       
        }else{
            return redirect()->route('editarPerfilCliente')->withErrors(['sucess'=>'Se modificaron los datos correctamente']);    
        }
    }
    private function newsEmailorDNI($request){
        $usuarioActual = Usuarios::select('email','dni')->where('id_usuario', $request->id_usuario)->get();
        if(($usuarioActual[0]->email <> $request->email) || ($usuarioActual[0]->dni <> $request->dni)){
            return true;
        }     
        return false;
    }
    private function updateEmailDNI($request){
        $found = Usuarios::where('email', $request->email)->get();
        $found2 = Usuarios::where('dni', $request->dni)->get();
        if($found->count() == 0){
            Usuarios::where('id_usuario',$request->id_usuario)->update(["email" => $request->email]);
            return 1;
        }elseif($found2->count() == 0){
            Usuarios::where('id_usuario',$request->id_usuario)->update([ "dni" => $request->dni]);
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
            return redirect()->route('homeEmp')->withErrors(['sucess'=>'El empleado se elimino correctamente']);
        }
        return redirect()->route('homeEmp')->withErrors(['sucess'=>'El empleado chofer no  se pudo eliminar, esta asignado a un viaje']);
    }
}