@extends('admin.layout')
@section('title', 'Reporte de Viajes')
@section('headerTitle','Reporte de Viajes')
@section('content')
    <div class="formulary">
        @if($viajes->isNotEmpty())
            <h2>Viajes desde la fecha {{$fechaDesde}} hasta la fecha {{$fechaHasta}} - Combi 19</h2>
            <table>
                <thead>
                    <th><strong>ID de Viaje</strong></th>
                    <th><strong>Chofer</strong></th>
                    <th><strong>Patente</strong></th>
                    <th><strong>Fecha</strong></th>
                    <th><strong>Hora</strong></th>
                    <th><strong>Origen</strong></th>
                    <th><strong>Destino</strong></th>
                    <th><strong>Precio</strong></th>
                    <th><strong>Pasajes Vendidos</strong></th>
                </thead>
                <tbody>
                    @foreach($viajes as $viaje)
                        <td>{{$viaje->id_viaje}}</td>
                        <td>{{$viaje->chofer}}</td>
                        <td>{{$viaje->patente}}</td>
                        <td>{{$viaje->fecha}}</td>
                        <td>{{$viaje->hora}}</td>
                        <td>{{$viaje->origen}}</td>
                        <td>{{$viaje->destino}}</td>
                        <td>${{$viaje->precio}}</td>
                        <td>{{$viaje->cant_asientos- $viaje->cantPasajes}}</td>
                    @endforeach
                </tbody>
            </table>
            <small>Reporte {{date('l jS \of F Y h:i:s A')}}</small>
            <br>
            <a href="javascript:window.print()"><button>Imprimir</button></a>
        @else
            <h2>No hay viajes registrados en el periodo ingresado</h2>
        @endif
        <br>
        <a href="{{route('Home_Reportes')}}"><button>Volver a reportes</button></a>
    </div>
@endsection