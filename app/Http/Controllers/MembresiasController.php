<?php

namespace App\Http\Controllers;

use App\Models\Membresias;
use Illuminate\Http\Request;
class MembresiasController extends Controller
{
    public function homemembresias(){
        $membresias = Membresias::all();  
        return view('admin.membresias.homeMembresia', compact('membresias'));
    }
    public function updatemembresias(Request $request){
        $membresia = Membresias::where("id_membresia", "=", $request->id_membresia)->get();
        return view('admin.membresias.updateMembresia',compact('membresia'));
    }
    public function updatemembresiasprocess(Request $request){
        $desc = floatval("$request->descuento");
        if(isset($request->nombre) && isset($request->descuento) && ($desc >= 0) ){
            Membresias::where("id_membresia", "=", $request->id_membresia)->update(["nombre"=> $request->nombre,
            "descuento" => $desc]);
            return redirect()->route('homemembresias')->withErrors(['updateprocess'=>'Membresia modificada correctamente']);
        }
        return redirect()->route('homemembresias')->withErrors(['updateprocess'=>'Se ingreso un descuento invalido o espacios en blanco']);        
    }   
}
