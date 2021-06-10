@extends('user.userLayout')
@section('title', 'Mis Viajes')
@section('headerTitle')
<h1>Mis Viajes</h1>
@endsection   
@section('content')
    @if($viajes->isNotEmpty())
        @foreach($viajes as $viaje)
            <div class="formulary">
                <tr>
                    <td>Fecha: {{$viaje->fecha}} </td> 
                    <td>Hora: {{$viaje->hora}}</td> <br>
                    <td>Origen: {{$viaje->origen}}</td> 
                    <td>Destino: {{$viaje->destino}}</td> <br>
                    <td>Precio: {{$viaje->precio}}$</td> <br>
                </tr>
            </div>   
        @endforeach
    @else
        <div class="formulary">
            <h2>Haz tu primer compra</h2>
            <a href="{{route('buscarViajesDisponibles')}}"><button>Comprar</button></a>
        </div>
    @endif
@error('success')
<script>
    Swal.fire({
        icon: 'warning',
        iconColor: '#48C9B0',
        title: '<strong style= "color: white; font-family: arial;"> {{$message}}</strong>',
        background:'#404040',
        confirmButtonColor: '#45B39D ',
        confirmButtonText: 'Got it!' ,
    })
</script>
@enderror
@endsection



