@extends('admin.layout')
@section('title', 'Buscar Viaje')
@section('headerTitle','Buscar Viaje')
@section('content')
    <div class="formulary" style="width: 600px">
        <h2>Viaje N°{{$viaje->id_viaje}} - Combi 19</h2>
        <small><strong>Chofer:</strong>{{$viaje->chofer}}</small><br>
        <small><strong>Destino:</strong>{{$viaje->destino}}</small><br>
        <small><strong>Fecha:</strong>{{$viaje->fecha}}</small><br>
        <small><strong>Hora:</strong>{{$viaje->hora}}</small><br>
        <table>
            <thead>
                <strong><th>Nombre</th></strong>
                <strong><th>Apellido</th></strong>
                <strong><th>DNI</th></strong>
                <strong><th>Email</th></strong>
                <strong><th>Precio</th></strong>
                <strong><th>Estado</th></strong>
            </thead>
            @foreach($pasajeros as $pasajero)
                <tbody>
                    <td>{{$pasajero->nombre}}</td>
                    <td>{{$pasajero->apellido}}</td>
                    <td>{{$pasajero->dni}}</td>
                    <td>{{$pasajero->email}}</td>
                    <td>${{$pasajero->precio}}</td>
                    <td>{{$pasajero->estado}}</td>
                </tbody>
            @endforeach
        </table>
        <a href="javascript:window.print()"><button>Imprimir</button></a>
        <a href="{{route('Home_Reportes')}}"><button>Volver a reportes</button></a>
        <br>
        <small>Reporte {{date('l jS \of F Y h:i:s A')}}</small>
    </div>
@endsection