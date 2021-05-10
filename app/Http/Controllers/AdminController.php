<?php
namespace App\Http\Controllers;

use App\Models\Ciudades;
use App\Models\Combis;
use App\Models\Insumos;
use App\Models\Membresias;
use App\Models\Rutas;
use App\Models\Usuarios;
use App\Models\Viajes;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function homeadmin(){
        $membresias = Membresias::all();
        $combis = Combis::join("categorias", "categorias.id_categoria", "=", "combis.id_categoria")
        ->select("combis.patente","combis.modelo","combis.color","combis.cant_asientos","categorias.nombre as categoria",
        "combis.disponible")->get();
        $choferes = Usuarios::select("usuarios.nombre","usuarios.apellido","usuarios.dni","usuarios.email")
        ->where("usuarios.id_permiso", "=", 2)->get();
        $insumos = Insumos::all();
        return view('admin.homeAdmin', compact('membresias','combis','choferes','insumos'));
    }   
}
