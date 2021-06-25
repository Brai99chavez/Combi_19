@extends('chofer.choferLayout')
@section('title', 'pasajeros')
@section('headerTitle')
<h1>pasajeros</h1>
@endsection   
@section('content')

<div class="formulary" style="width: 700px">
<h1>pasajeros</h1>
@if($pasajeros->isNotEmpty())
        @foreach($pasajeros as $pasajero)
                <tr>
                    <td><strong>PASAJE N°: </strong> {{$pasajero->id_pasaje}} </td> 
                    <td><strong>nombre: </strong>  {{$pasajero->nombre}}</td>
                    <td><strong>apellido: </strong>  {{$pasajero->apellido}}</td> 
                    <td><strong>Dni: </strong>  {{$pasajero->dni}}</td>
                </tr>
                <hr>

        @endforeach

       <a href="{{route('misViajesChofer')}}"><button type="submit" class="botones" style="width: 150px">VolverAtras</button></a> 
    @else
        <div class="formulary">
            <h1><strong>Este Viaje No Tiene Pasajeros </strong></h1>
           
            <a href="{{route('misViajesChofer')}}"><button type="submit" class="botones" style="width: 150px">VolverAtras</button></a> 
        </div>
    @endif
</div>

@endsection