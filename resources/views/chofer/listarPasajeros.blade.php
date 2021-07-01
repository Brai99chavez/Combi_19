@extends('chofer.choferLayout')
@section('title', 'pasajeros')
@section('headerTitle')
<h1>Pasajeros</h1>
@endsection   
@section('content')

    @if($pasajeros->isNotEmpty())
        <table>
            <thead>
                <th>ID Pasaje</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Estado de Pasajero</th>
                <th>Registrar Sintomas</th>
            </thead>
            <tbody>
                @foreach($pasajeros as $pasajero)
                <tr>
                    <td>{{$pasajero->id_pasaje}}</td>
                    <td>{{$pasajero->nombre}}</td>
                    <td>{{$pasajero->apellido}}</td> 
                    <td>{{$pasajero->dni}}</td>
                    <td>{{$pasajero->estado}}</td>
                    @if($pasajero->estado == "Pendiente" && $fecha[0]->fecha == date('Y-m-d'))
                        <td>
                            <form action="{{route('registrarSintomasCovid')}}" method="GET">
                                @csrf
                                <input type="hidden" name="id_usuario" value="{{$pasajero->id_usuario}}">
                                <input type="hidden" name="id_viaje" value="{{$id_viaje}}">
                                <button type="submit"><i class="fas fa-edit"></button>
                            </form>
                        </td>    
                    @endif
                </tr>
                @endforeach 
            </tbody>
        </table>
    @else
        <em><strong>Viaje sin ventas</strong></em>
        @if($fecha[0]->fecha == date('Y-m-d'))
            <a href=""><button type="submit" class="botones" style="width: 150px">Cancelar Viaje</button></a>
        @endif
    @endif

@endsection