@extends('admin.layout')
@section('title', 'Reportes')
@section('headerTitle','Reportes')
@section('content')
    <div class="formulary">
        <h2>Reportes</h2>
<<<<<<< HEAD
        <a href="{{route('ingresoIDViaje')}}"><button>Pasajeros de un Viaje</button></a><br><br><br>
        <a href="{{route('ingresoPeriodo')}}"><button>Viajes en un periodo</button></a><br><br><br>
        <a href="{{route('reportesPasajerosCOVID')}}"><button>Pasajeros con sintomas COVID</button></a><br><br><br>
=======

            <button type="submit" onclick=location.href="{{route('ingresoIDViaje')}}">Pasajeros de Viaje</button><br><br><br>
            <button type="submit" onclick=location.href="{{route('ingresoPeriodo')}}"> Viajes en un periodo</button><br><br><br>
            <button type="submit" onclick=location.href="{{route('reportesPasajerosCOVID')}}">Pasajeros con sintomas COVID</button><br><br><br>
>>>>>>> a5c0c1cf434eba741f6af8426302650b495a1749
    </div>
@endsection