<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Models\Viajes;
use Illuminate\Http\Request;

class reportesController extends Controller
{
        public function Home_Reportes(){
        return view('admin.reportes.homeReportes');
       }

       public function reportePasajerosViajeProcess(Request $request){
        $found = Viajes::where('id_viaje',$request->id_viaje)->get();
        if($found->count() > 0){
            $viaje = Viajes::join("usuarios","usuarios.id_usuario", "=", "viajes.id_chofer")
            ->join("rutas", "rutas.id_ruta", "=", "viajes.id_ruta")
            ->join("combis", "combis.id_combi", "=", "viajes.id_combi")
            ->join("categorias", "categorias.id_categoria", "=", "combis.id_categoria")
            ->join("ciudades", "ciudades.id_ciudad", "=", "rutas.id_ciudadOrigen")
            ->join("ciudades as c2", "c2.id_ciudad", "=", "rutas.id_ciudadDestino")
            ->select("viajes.id_viaje","viajes.fecha", "viajes.hora", "ciudades.nombre as origen",
            "c2.nombre as destino","combis.patente","usuarios.nombre as chofer")
            ->where('viajes.id_viaje',$request->id_viaje)
            ->first();
            $pasajeros = Usuarios::join('pasajes', 'pasajes.id_usuario', '=', 'usuarios.id_usuario')
            ->where('pasajes.id_viaje',$request->id_viaje)->select('usuarios.nombre','usuarios.apellido',
            'usuarios.dni','usuarios.email','pasajes.precio','pasajes.estado')->get();
            return view('admin.reportes.reportePasajerosDeUnViaje',compact('pasajeros', 'viaje'));
        }
        return redirect()->route('ingresoIDViaje')->withErrors(['error'=>'Viaje no registrado, volve a intentar']);
       }
       public function idViajeReporte(){
            return view ('admin.reportes.ingresoDeIDViajeReporte');    
       }
       
       public function ingresoPeriodo(){
           return view ('admin.reportes.ingresoPeriodo');
       }

       public function reportesViajesEnUnPeriodo(Request $request){
            $request->validate(['desdeFecha' => 'required|before_or_equal:fechaActual',
            'hastaFecha' => 'required|before_or_equal:fechaActual'],
           ['required' => 'No pueden haber campos vacios', 'before_or_equal' => 'Ingrese fechas pasadas']);
            $viajes = Viajes::join("usuarios","usuarios.id_usuario", "=", "viajes.id_chofer")
            ->join("rutas", "rutas.id_ruta", "=", "viajes.id_ruta")
            ->join("combis", "combis.id_combi", "=", "viajes.id_combi")
            ->join("categorias", "categorias.id_categoria", "=", "combis.id_categoria")
            ->join("ciudades", "ciudades.id_ciudad", "=", "rutas.id_ciudadOrigen")
            ->join("ciudades as c2", "c2.id_ciudad", "=", "rutas.id_ciudadDestino")
            ->select("viajes.id_viaje","viajes.fecha", "viajes.hora", "ciudades.nombre as origen", "viajes.precio",
            "c2.nombre as destino","combis.patente","usuarios.nombre as chofer","combis.cant_asientos","viajes.cantPasajes")
            ->where("viajes.fecha","<=",$request->hastaFecha)
            ->where("viajes.fecha",">=",$request->desdeFecha)
            ->where("viajes.estado","=","Finalizado")
            ->get();
            $fechaDesde = $request->desdeFecha;
            $fechaHasta = $request->hastaFecha;
            return view ('admin.reportes.reporteViajesDeUnPeriodo', compact('viajes','fechaDesde','fechaHasta'));
       }

       public function reportesPasajerosCOVID(){
        return $pasajeros = Usuarios::join('registros_covid','registros_covid.id_usuario','=','usuarios.id_usuario')
        ->join('sintomas','sintomas.id_sintoma','=','registros_covid.id_sintoma')
        ->get();
        return view('admin.reportes.reportePasajerosConSintomasCOVID', compact('pasajeros'));
       }
}

