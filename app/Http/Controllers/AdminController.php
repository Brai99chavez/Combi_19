<?php
namespace App\Http\Controllers;

use App\Models\Ciudades;
use App\Models\Combis;
use App\Models\Insumos;
use App\Models\Membresias;
use App\Models\Usuarios;
use App\Models\Viajes;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function homeadmin(){
        $viajes = Viajes::join("usuarios","usuarios.id_usuario", "=", "viajes.id_chofer")
        ->join("rutas", "rutas.id_ruta", "=", "viajes.id_ruta")
        ->join("combis", "combis.id_combi", "=", "viajes.id_combi")
        ->join("categorias", "categorias.id_categoria", "=", "combis.id_categoria")
        ->join("ciudades", "ciudades.id_ciudad", "=", "rutas.id_ciudadOrigen")
        ->join("ciudades as c2", "c2.id_ciudad", "=", "rutas.id_ciudadDestino")
        ->select("categorias.nombre as categoria","usuarios.nombre as chofer", "combis.patente", 
        "viajes.precio as precio", "ciudades.nombre as origen", "c2.nombre as destino")
        ->get();
        $membresias = Membresias::all();
        $combis = Combis::join("categorias", "categorias.id_categoria", "=", "combis.id_categoria")
        ->select("combis.patente","combis.modelo","combis.color","combis.cant_asientos","categorias.nombre as categoria",
        "combis.disponible")->get();
        $choferes = Usuarios::select("usuarios.nombre","usuarios.apellido","usuarios.dni","usuarios.email")
        ->where("usuarios.id_permiso", "=", 2)->get();
        $insumos = Insumos::all();
        return view('admin.homeAdmin', compact('viajes','membresias','combis','choferes','insumos'));
    }
}
