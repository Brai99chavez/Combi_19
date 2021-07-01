@extends('admin.layout')
@section('title', 'Reportes')
@section('headerTitle','Reportes')
@section('content')
    <div class="formulary">
        <h2>Reportes</h2>
            <button type="submit" onclick=location.href="{{route('ingresoIDViaje')}}">Pasajeros de Viaje</button><br><br><br>
            <button type="submit" onclick=location.href="{{route('ingresoPeriodo')}}"> Viajes en un periodo</button><br><br><br>
            <button type="submit" onclick=location.href="{{route('reportesPasajerosCOVID')}}">Pasajeros con sintomas COVID</button><br><br><br>
    </div>
@endsection