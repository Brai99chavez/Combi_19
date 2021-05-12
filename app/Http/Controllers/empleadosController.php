<?php

namespace App\Http\Controllers;

use App\Http\Requests\empleadosRequest;
use App\Models\Usuarios;
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
        return redirect()->route('homeEmp');
    }

    public function updateEmp (Request $request){
        $usuario =  Usuarios::where('id_usuario','=',$request->id_usuario)->get();
        return view('admin.empleados.updateEmp',compact('usuario'));
    }

    public function saveEmp(Request $request){

        if (($request->nombre == null)or($request->apellido == null)or($request->dni == null)or($request->email == null)or($request->contraseña == null) ) {
            
            return redirect()->route('homeEmp')->withErrors(['sucess'=>'error al modificar , hay campos vacios']);

        } else {

            $usuario = new Usuarios;
            $usuario->nombre = $request->nombre;
            $usuario->apellido = $request->apellido;
            $usuario->dni = $request->dni;
            $usuario->email = $request->email;
            $usuario->contraseña = $request->contraseña;
            Usuarios::where('email',$request->email)->update(["nombre"=> $request->nombre,
            "apellido" => $request->apellido,"dni" => $request->dni,"email" => $request->email,
            "contraseña" => $request->contraseña,]);
            return redirect()->route('homeEmp')->withErrors(['sucess'=>'se modificaron los datos correctamente']);

        }

    }

    public function deleteEmp (){
        
        return view('admin.empleados.createEmp');
    }

}