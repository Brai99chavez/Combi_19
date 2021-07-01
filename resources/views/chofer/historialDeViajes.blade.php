@extends('chofer.choferLayout')
@section('title', 'historial de viajes')
@section('headerTitle')
<h1>Historial de Viajes</h1>
@endsection   
@section('content')
    <div class="formulary">
        @if($viajes->isNotEmpty())
        <table>
            <thead>
                <th>ID de Viaje</th>
                <th>Patente</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Fecha</th>
                <th>Hora</th>
            </thead>
            <tbody>
                @foreach($viajes as $viaje)
                    <td>{{$viaje->id_viaje}}</td>
                    <td>{{$viaje->patente}}</td>
                    <td>{{$viaje->origen}}</td>
                    <td>{{$viaje->destino}}</td>
                    <td>{{$viaje->fecha}}</td>
                    <td>{{$viaje->hora}}</td>
                @endforeach
            </tbody>
        </table>
        @else
            <em><h2>Sin Viajes Asignados</h2></em>
        @endif
    </div>
@endsection