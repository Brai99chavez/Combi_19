@extends('admin.layout')
@section('title', 'Buscar Viaje')
@section('headerTitle','Buscar Viaje')
@section('content')
    <div class="formulary" style="width: 600px">
        <h2>Viaje N°{{$viaje->id_viaje}} - Combi 19</h2>
        <p>------------------------------------------------------</p>
            @foreach($pasajeros as $pasajero)
            <strong>Nombre: </strong> {{$pasajero->nombre}} <br>
            <strong>Apellido: </strong>{{$pasajero->apellido}}<br>
            <strong>DNI: </strong>{{$pasajero->dni}}<br>
            <strong>Email: </strong>{{$pasajero->email}}<br>
            <strong>Precio: </strong> ${{$pasajero->precio}}<br>
            <strong>Estado: </strong> {{$pasajero->estado}}<br>
            <p>------------------------------------------------------</p>
            @endforeach
        </table>
        <a href="javascript:window.print()"><button>Imprimir</button></a>
        <a href="{{route('Home_Reportes')}}"><button>Volver a reportes</button></a>
        <br>
        <small>Reporte {{date('l jS \of F Y h:i:s A')}}</small>
    </div>
@endsection