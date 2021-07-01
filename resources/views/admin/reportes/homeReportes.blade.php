@extends('admin.layout')
@section('title', 'Reportes')
@section('headerTitle','Reportes')
@section('content')
    <div class="formulary">
        <h2>Reportes</h2>
        <a href="{{route('ingresoIDViaje')}}"><button>Pasajeros de un Viaje</button></a><br><br><br>
        <a href="{{route('ingresoPeriodo')}}"><button>Viajes en un periodo</button></a><br><br><br>
        <a href="{{route('reportesPasajerosCOVID')}}"><button>Pasajeros con sintomas COVID</button></a><br><br><br>
    </div>
@endsection