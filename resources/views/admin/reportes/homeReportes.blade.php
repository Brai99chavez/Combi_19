@extends('admin.layout')
@section('title', 'Buscar Viaje')
@section('headerTitle','Buscar Viaje')
@section('content')
    <div class="formulary">
        <h2>Reportes</h2>
        <form action="">
            <a href="{{route('ingresoIDViaje')}}"><button>Pasajeros de un Viaje</button></a><br><br><br>
            <a href="{{route('ingresoPeriodo')}}"><button>Viajes en un periodo</button></a><br><br><br>
            <a href="{{route('reportesPasajerosCOVID')}}"><button>Pasajeros con sintomas COVID</button></a><br><br><br>
        </form>
    </div>
@endsection