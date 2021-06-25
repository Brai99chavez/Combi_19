<?php

namespace App\Http\Controllers;

use App\Http\Requests\buscarViajeRequest;
use App\Http\Requests\clienteMembresiaRequest;
use App\Models\Categorias;
use App\Models\Ciudades;
use App\Models\Pasajes;
use App\Models\Viaje_insumos;
use App\Models\Viajes;
use App\Models\Combis;
use App\Models\Comentarios;
use App\Models\Insumos;
use App\Models\Membresias;
use App\Models\Rutas;
use App\Models\Tarjetas;
use App\Models\Usuarios;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function homeUser(){
        $comentarios = Comentarios::join('usuarios','usuarios.id_usuario','=','comentarios.id_usuario')
        ->select('usuarios.nombre','usuarios.apellido','usuarios.id_usuario','comentarios.id_comentario',
        'comentarios.descripcion','comentarios.created_at')
        ->orderByDesc('comentarios.created_at')
        ->limit(10)
        ->get();
        return view('user.userHome', compact('comentarios'));
    } 
    public function editarPerfilCliente(){
        $usuario = Usuarios::where('id_usuario',session('id_usuario'))->get();
        return view('user.editarPerfilCliente', compact('usuario'));
    }
    public function buscarViajesDisponibles(){
        $ciudades = Ciudades::where('disponible',1)->get();
        return view('user.buscarviaje.buscarViajes',compact('ciudades'));
    }
    public function buscarViajesProcess(buscarViajeRequest $request){
        $ruta = Rutas::select('id_ruta')->where('id_ciudadOrigen',$request->origen)->where('id_ciudadDestino',$request->destino)->get();
        if($ruta->count()==1){
            $found = Viajes::where('id_ruta',$ruta[0]->id_ruta)->get();
            if($found->count()>0){
               $viajes = Viajes::join("usuarios","usuarios.id_usuario", "=", "viajes.id_chofer")
                ->join("rutas", "rutas.id_ruta", "=", "viajes.id_ruta")
                ->join("combis", "combis.id_combi", "=", "viajes.id_combi")
                ->join("categorias", "categorias.id_categoria", "=", "combis.id_categoria")
                ->join("ciudades", "ciudades.id_ciudad", "=", "rutas.id_ciudadOrigen")
                ->join("ciudades as c2", "c2.id_ciudad", "=", "rutas.id_ciudadDestino")
                ->select("viajes.id_viaje","categorias.nombre as categoria","usuarios.nombre as chofer", 
                "viajes.precio as precio", "ciudades.nombre as origen", "c2.nombre as destino","viajes.fecha",'viajes.hora'
                ,'viajes.id_ruta','viajes.estado','viajes.cantPasajes')
                ->where('viajes.fecha',$request->fecha)
                ->where('viajes.id_ruta',$ruta[0]->id_ruta)
                ->where('viajes.estado',"Pendiente")
                ->get();
                return view('user.buscarviaje.viajesDisponibles ',compact('viajes'));
            }
            return redirect()->route('buscarViajesDisponibles')->withErrors(['success' => 'No tenemos viajes disponibles para vos']);
        }
        return redirect()->route('buscarViajesDisponibles')->withErrors(['success' => 'No tenemos viajes disponibles para vos']);
    }
    public function viajesDisponibles(){
        $viajes = Viajes::join("usuarios","usuarios.id_usuario", "=", "viajes.id_chofer")
        ->join("rutas", "rutas.id_ruta", "=", "viajes.id_ruta")
        ->join("combis", "combis.id_combi", "=", "viajes.id_combi")
        ->join("categorias", "categorias.id_categoria", "=", "combis.id_categoria")
        ->join("ciudades", "ciudades.id_ciudad", "=", "rutas.id_ciudadOrigen")
        ->join("ciudades as c2", "c2.id_ciudad", "=", "rutas.id_ciudadDestino")
        ->select("viajes.id_viaje","categorias.nombre as categoria","usuarios.nombre as chofer", "combis.patente", 
        "viajes.precio as precio", "ciudades.nombre as origen", "c2.nombre as destino","viajes.fecha",'viajes.hora',"viajes.cantPasajes")
        ->orderByDesc('viajes.id_viaje')
        ->get();
        $viaje_insumos = Viaje_insumos::join("viajes","viajes.id_viaje","=","viaje_insumo.id_viaje")
        ->join("insumos","insumos.id_insumos","=","viaje_insumo.id_insumo")
        ->select("insumos.nombre","viajes.id_viaje")->orderBy('viajes.id_viaje','asc')->get();

        return view('user.buscarviaje.viajesDisponibles',compact('viajes','viaje_insumos'));
    }

    public function resumenCompra(Request $request){
        $viaje = Viajes::join("usuarios","usuarios.id_usuario", "=", "viajes.id_chofer")
        ->join("rutas", "rutas.id_ruta", "=", "viajes.id_ruta")
        ->join("combis", "combis.id_combi", "=", "viajes.id_combi")
        ->join("categorias", "categorias.id_categoria", "=", "combis.id_categoria")
        ->join("ciudades", "ciudades.id_ciudad", "=", "rutas.id_ciudadOrigen")
        ->join("ciudades as c2", "c2.id_ciudad", "=", "rutas.id_ciudadDestino")
        ->select("viajes.id_viaje","categorias.nombre as categoria","usuarios.nombre as chofer", "combis.patente", 
        "viajes.precio as precio", "ciudades.nombre as origen", "c2.nombre as destino","viajes.fecha",'viajes.hora',
        "viajes.cantPasajes")->where('viajes.id_viaje',$request->id_viaje)->get();
        $golden = Membresias::select('descuento')->where('id_membresia',1)->get();
        $descuento = $golden[0]->descuento * $viaje[0]->precio / 100;
        $precioConDescuento = $viaje[0]->precio - $descuento;
        $cantPasajes = $request->cantPasajes;
        return view('user.pagarviaje.detallesViajeCompra', compact('viaje','precioConDescuento','descuento','golden','cantPasajes'));
    }
    public function crearPago(Request $request){
        $request->validate(['cantPasajesCompra' => 'required|numeric|lte:cantPasajes'],['lte' => 'La cantidad ingresada supera el limite de pasajes disponibles']);
        $id_viaje = $request->id_viaje;
        $cantPasajesCompra = $request->cantPasajesCompra;
        if(isset($request->precioConDescuento)){
            $precioConDescuento = $request->precioConDescuento * $request->cantPasajesCompra;
            $precioindiv = $request->precioConDescuento;
        }else{
            $precio = $request->precio * $request->cantPasajesCompra;
            $precioindiv = $request->precio;
        }
        if(session('id_membresia')==1)
            return view('user.pagarviaje.crearPago', compact('id_viaje','cantPasajesCompra','precio','precioindiv'));
        else{
            $numero = Usuarios::where('id_usuario',session('id_usuario'))->select('tarjeta')->get();
            $resultado = substr($numero[0]->tarjeta, 12, 4);
            return view('user.pagarviaje.realizarPagoGolden',compact('id_viaje','resultado','cantPasajesCompra','precioConDescuento','precioindiv'));
        }
    }     
    public function pagoConTarjetaNueva(clienteMembresiaRequest $request){
        $this->processingPagoPasajes($request);
        return redirect()->route('misViajes')->withErrors(['sucess' => 'Compra Exitosa']);
    }
    public function pagoConTarjetaGuardada(Request $request){
        $this->processingPagoPasajes($request);
        return redirect()->route('misViajes')->withErrors(['sucess' => 'Compra Exitosa']);
    }

    private function processingPagoPasajes($request){
        for ($i = 0; $i < $request->cantPasajesCompra;$i++){
            $pasaje = new Pasajes;
            $pasaje->id_usuario = session('id_usuario');
            $pasaje->id_viaje = $request->id_viaje;
            $pasaje->estado = "Pendiente";
            $pasaje->precio = $request->precio;
            $pasaje->save();
        }
        $pasajesActuales = Viajes::where('id_viaje',$request->id_viaje)->select('cantPasajes')->get();
        $resultado = $pasajesActuales[0]->cantPasajes - $request->cantPasajesCompra;
        Viajes::where('id_viaje',$request->id_viaje)->update(['cantPasajes' => $resultado]);
        return 0;
    }
    public function misViajes(){
        $viajes = Pasajes::join('viajes','viajes.id_viaje','=','pasajes.id_viaje')
        ->join("usuarios","usuarios.id_usuario", "=", "viajes.id_chofer")
        ->join("rutas", "rutas.id_ruta", "=", "viajes.id_ruta")
        ->join("combis", "combis.id_combi", "=", "viajes.id_combi")
        ->join("categorias", "categorias.id_categoria", "=", "combis.id_categoria")
        ->join("ciudades", "ciudades.id_ciudad", "=", "rutas.id_ciudadOrigen")
        ->join("ciudades as c2", "c2.id_ciudad", "=", "rutas.id_ciudadDestino")
        ->select("pasajes.id_pasaje","categorias.nombre as categoria","pasajes.precio",
         "ciudades.nombre as origen", "c2.nombre as destino","viajes.fecha",'viajes.hora','viajes.id_viaje',"pasajes.estado")
        ->where('pasajes.id_usuario',session('id_usuario'))
        ->where('pasajes.estado','=',"Pendiente")
        ->get();
        return view('user.misviajes.misViajes',compact('viajes'));
    }
    public function updateMembresia(){
        $golden = Membresias::where('id_membresia',1)->get();
        return view('user.actualizarMembresia', compact('golden'));
    }
    public function processingMembresiaUpdateGolden(clienteMembresiaRequest $request){
        Usuarios::where('id_usuario',session('id_usuario'))->update(['id_membresia' => 1, 'tarjeta' => $request->tarjeta,
        'fechaVenc' => $request->fechaVenc, 'codigo' => $request->codigo]);
        session(['id_membresia'=> 1]);
        session(['tarjeta'=> $request->tarjeta]);session(['fechaVenc' => $request->fechaVenc]);session(['codigo' => $request->codigo]);
        return redirect()->route('updateMembresiaCliente')->withErrors(['success'=>'Ahora usted tiene membresia GOLDEN']);
    }
    public function processingMembresiaUpdateBasic(Request $request){
        Usuarios::where('id_usuario', session('id_usuario'))->update(['id_membresia' => 2, 'tarjeta' => null,
        'fechaVenc' => null, 'codigo' => null]);
        session(['id_membresia'=> 2]);session(['tarjeta' => null]);session(['fechaVenc' => null]);session(['codigo' => null]);
        return redirect()->route('updateMembresiaCliente')->withErrors(['success'=>'Ahora usted tiene membresia BASIC']);  
    }
    public function processingUpdateTarjetaCliente(clienteMembresiaRequest $request){
        if(session('tarjeta') <> $request->tarjeta){
            Usuarios::where('id_usuario',session('id_usuario'))->update(['tarjeta' => $request->tarjeta,
            'fechaVenc' => $request->fechaVenc, 'codigo' => $request->codigo]);
            return redirect()->route('updateMembresiaCliente')->withErrors(['success'=>'Tarjeta actualizada']);
        }
        return redirect()->route('updateMembresiaCliente')->withErrors(['success'=>'La tarjeta ingresada es la actual, ingrese otra']);
    }
    public function insumosViajeCliente(Request $request){
        $insumos = Insumos::join('viaje_insumo','id_insumos','=','id_insumo')
        ->where('viaje_insumo.id_viaje',$request->id_viaje)
        ->select('insumos.nombre','insumos.descripcion','insumos.precio')->get();
        return view('user.viewInsumosViaje', compact('insumos'));
    
        Usuarios::where('id_usuario', session('id_usuario')->update(['id_membresia' => 1]));
        return redirect()->route('updateMembresiaCliente')->withErrors(['success'=>'Ahora usted tiene membresia BASIC']);   
    }

    public function guardarComentario(Request $request){
        $request->validate(['descripcion' => 'required'],['required' => 'Ingrese un comentario']);
        $newComentario = new Comentarios();
        $newComentario->descripcion = $request->descripcion;
        $newComentario->id_usuario = session('id_usuario');
        $newComentario->id_viaje = $request->id_viaje;
        $newComentario->save();
        return redirect()->route('historialDeViajes')->withErrors(['success'=>'Comentario subido']);   
    }
    public function historialDeViajes(){
        $viajes = Viajes::join('pasajes','pasajes.id_viaje','=','viajes.id_viaje')
        ->join("rutas", "rutas.id_ruta", "=", "viajes.id_ruta")
        ->join("combis", "combis.id_combi", "=", "viajes.id_combi")
        ->join("categorias", "categorias.id_categoria", "=", "combis.id_categoria")
        ->join("ciudades", "ciudades.id_ciudad", "=", "rutas.id_ciudadOrigen")
        ->join("ciudades as c2", "c2.id_ciudad", "=", "rutas.id_ciudadDestino")
        ->select("viajes.id_viaje","categorias.nombre as categoria","viajes.precio as precio",
         "ciudades.nombre as origen", "c2.nombre as destino","viajes.fecha")
        ->where('pasajes.id_usuario',session('id_usuario'))
        ->where('viajes.estado',"Finalizado")
        ->get();
        return view('user.misviajes.historialDeViajes',compact('viajes'));
    }
    public function viewComentariosViaje(Request $request){
        $comentarios = Comentarios::join('usuarios','usuarios.id_usuario','=','comentarios.id_usuario')
        ->select('usuarios.nombre','usuarios.apellido','usuarios.id_usuario','comentarios.id_comentario',
        'comentarios.descripcion','comentarios.created_at')
        ->where('id_viaje',$request->id_viaje) 
        ->orderByDesc('comentarios.created_at')
        ->get();
        $id_viaje = $request->id_viaje; 
        return view('user.misviajes.comentariosDeUnViaje',compact('comentarios','id_viaje'));
    }

    public function reembolsoProcess($request){
        $found = Pasajes::select('created_at')->where('id_pasaje',$request->id_pasaje)->get();
        $dias = Carbon::now()->diffInDays($found[0]->created_at);
        Pasajes::where('id_pasaje',$request->id_pasaje)->update(['estado' => 'Cancelado']);
        if($dias < 2){
            return 0;
        }
        return 1;
        
    }
    public function reembolsoProcessClienteGolden(Request $request){
        if($this->reembolsoProcess($request)==0){
            return redirect()->route('misViajes')->withErrors(['sucess'=>'Reembolso aceptado, devolución del 100% del monto']);
        }
        return redirect()->route('misViajes')->withErrors(['sucess'=>'Reembolso aceptado, devolución del 50% del monto']);
    }
    public function reembolsoProcessClienteBasic(clienteMembresiaRequest $request){
        if($this->reembolsoProcess($request)==0){
            return redirect()->route('misViajes')->withErrors(['sucess'=>'Reembolso aceptado, devolución del 100% del monto']);
        }
        return redirect()->route('misViajes')->withErrors(['sucess'=>'Reembolso aceptado, devolución del 50% del monto']);
    }

    public function reembolsoTarjetaBasic(Request $request){
        $id_pasaje = $request->id_pasaje;
        $monto = Pasajes::where('id_pasaje', $request->id_pasaje)->get();
        return view ('user.misviajes.reembolsoBASIC', compact('id_pasaje', 'monto'));
    }
    public function updateComentario(Request $request){
        $comentario = Comentarios::where('id_comentario',$request->id_comentario)->get();
        $id_viaje = $request->id_viaje;
        return view('user.misviajes.updateComentario',compact('comentario','id_viaje'));
    }
    public function updateComentarioProcess(Request $request){
        $request->validate(['descripcion' => 'required'],['required' => 'Ingrese un comentario']);
        Comentarios::where('id_comentario',$request->id_comentario)->update(['descripcion' => $request->descripcion]);
        return $this->viewComentariosViaje($request);
    }
    public function deleteComentarioProcess(Request $request){
        Comentarios::where('id_comentario',$request->id_comentario)->delete();
        return $this->viewComentariosViaje($request);
    }
}