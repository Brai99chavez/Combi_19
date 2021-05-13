<?php

namespace App\Http\Controllers;

use App\Models\Ciudades;
use Illuminate\Http\Request;

class ciudadesController extends Controller
{
    public function showCiudades (){
        $ciudades = Ciudades::select('nombre','direccion','disponible')->get();
        return view('admin.ciudades.homeCiudades',compact('ciudades'));
    }
}
