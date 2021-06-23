@extends('chofer.choferLayout')
@section('title', 'Home Chofer')
@section('headerTitle')
<h1>Home</h1>
@endsection   
@section('content')
<div class="formulary" style="width: 900px">
    <table>
        @if($viajesToday->count()>0)
            <i><h2>Viajes asignados para el dia de hoy</h2></i>
            <thead>
                <tr>
                    <th>N° Viaje</th>
                    <th>Patente</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($viajesToday as $viaje)
                    <tr>
                        <td>{{$viaje->id_viaje}}</td>
                        <td>{{$viaje->patente}}</td>
                        <td>{{$viaje->fecha}}</td>
                        <td>{{$viaje->hora}}</td>
                        <td>{{$viaje->origen}}</td>
                        <td>{{$viaje->destino}}</td>
                        <td>{{$viaje->estado}}</td>
                    </tr>
                @endforeach
        @else
            <i><h2>Sin viajes asignados para hoy</h2></i>
        @endif
    </tbody>
</table>
</div>

@endsection