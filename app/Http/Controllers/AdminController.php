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

        if (session()->get('id_permiso') == 1) {
            return redirect()->route('homeUser')->withErrors(['permiso'=>'intento ingresar a una zona no autorizada']);
        }elseif (session()->get('id_permiso') == 2) {
            return redirect()->route('homeChofer')->withErrors(['permiso'=>'intento ingresar a una zona no autorizada']);
        }elseif (session()->get('id_permiso') == 3) {

            $membresias = Membresias::all();
            $combis = Combis::join("categorias", "categorias.id_categoria", "=", "combis.id_categoria")
            ->select("combis.patente","combis.modelo","combis.color","combis.cant_asientos","categorias.nombre as categoria")->get();
            $choferes = Usuarios::select("usuarios.nombre","usuarios.apellido","usuarios.dni","usuarios.email")
            ->where("usuarios.id_permiso", "=", 2)->get();
            return view('admin.homeAdmin', compact('membresias','combis','choferes'));

        }
    }   

    public function showReports(){
        return view('admin.reports');
    }
}
