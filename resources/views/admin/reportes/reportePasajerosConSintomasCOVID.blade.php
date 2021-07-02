@extends('admin.layout')
@section('title', 'Reporte COVID')
@section('headerTitle','Reporte Pasajeros Con Sintomas COVID')
@section('content')
<div class="formulary">
    <h2>Pasajeros con Covid</h2>
    @if($pasajeros->isNotEmpty())
    <form action="">
    @foreach($pasajeros as $pasajero)
    <strong>Nombre:</strong>{{$pasajero->nombre}}<br>
    <strong>Apellido: </strong>{{$pasajero->apellido}}<br>
    <strong>DNI: </strong>{{$pasajero->dni}}<br>
    <strong>Email: </strong>{{$pasajero->email}}<br>
    <ul style="list-style: none">
        <strong>Sintomas</strong>
        @foreach($sintomas as $sintoma)
            @if($sintoma->id_usuario == $pasajero->id_usuario)
            <li>{{$sintoma->nombre_sintoma}}</li>
            @endif
        @endforeach
    </ul>
    <p>-----------------------------------------------------------------</p>
@endforeach</form>
    @else
    <h2>No se registran pasajeros con sintomas COVID</h2>
    <br>
    <button onclick=location.href="{{route('Home_Reportes')}}" >Volver a reportes</button>
    @endif
</div>
@endsection
