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
}
