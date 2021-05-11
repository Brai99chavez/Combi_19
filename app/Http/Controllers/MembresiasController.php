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
    public function updatemembresias($id_membresia){
        $membresia = Membresias::where("membresias.id_membresia", "=", $id_membresia);
        return view('admin.membresias.updateMembresia',compact('membresia'));
    }
}
