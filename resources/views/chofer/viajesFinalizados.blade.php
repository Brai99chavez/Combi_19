@extends('chofer.choferLayout')
@section('title', 'viajes Finalizados')
@section('headerTitle')
<h1>Viajes Finalizados</h1>
@endsection   
@section('content')

    @if($viajes->isNotEmpty())
        @foreach($viajes as $viaje)
            <div class="formulary" style="width: 500px">
            <h2>DETALLES DEL VIAJE</h2>
                <tr>
                    <td><strong>Fecha:</strong>{{$viaje->fecha}} </td> <br>
                    <td><strong>Hora:</strong>  {{$viaje->hora}}</td><br>
                    <td><strong>Origen:</strong>  {{$viaje->origen}}</td> <br>
                    <td><strong>Destino:</strong>  {{$viaje->destino}}</td><br>
                    <td><strong>Precio:</strong>  {{$viaje->precio}}</td>
                    <br>
                    <h2>DETALLES DE LA COMBI</h2>
                    
                    <td><strong> patente:</strong>  {{$viaje->patente}}</td><br>
                    <td><strong> modelo:</strong>  {{$viaje->modelo}}</td><br>
                    <td><strong> color:</strong>  {{$viaje->color}}</td><br>
                    <td><strong> cantAsientos:</strong>  {{$viaje->cant_asientos}}</td>

                    <br> <br>
                    <td><strong>*ESTADO:</strong>  {{$viaje->estado}}</td>
                </tr>
                <hr>
                <form action="{{route('listarPasajeros')}}" method="GET">
                @csrf
                    <input type="hidden" name="id_viaje" value="{{$viaje->id_viaje}}">
               
                    <button type="submit" class="botones" style="width: 150px">Listar pasajeros</button>
                </form>



            </div>   
        @endforeach
    @else
        <div class="formulary">
            <strong><em>No tiene ningun viaje Finalizado</em></strong><br><br>
        </div>
    @endif

@endsection