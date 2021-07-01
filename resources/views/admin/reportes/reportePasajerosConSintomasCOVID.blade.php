@extends('admin.layout')
@section('title', 'Reporte COVID')
@section('headerTitle','Reporte Pasajeros Con Sintomas COVID')
@section('content')
<div class="formulary">
    @if($pasajeros->isNotEmpty())
        @foreach($pasajeros as $pasajero)
            <strong>Nombre:</strong>{{$pasajero->nombre}}<br>
            <strong>Apellido: </strong>{{$pasajero->apellido}}<br>
            <strong>DNI: </strong>{{$pasajero->dni}}<br>
            <strong>Email: </strong>{{$pasajero->email}}<br>
            <ul>
                <strong>Sintomas</strong>
                @foreach($sintomas as $sintoma)
                    @if($sintoma->id_usuario == $pasajero->id_usuario)
                    <li>{{$sintoma->nombre_sintoma}}</li>
                    @endif
                @endforeach
            </ul>
            <p>-------------------------------------</p>
        @endforeach
    @else
    <h2>No se registran pasajeros con sintomas COVID</h2>
    @endif
</div>
@endsection
