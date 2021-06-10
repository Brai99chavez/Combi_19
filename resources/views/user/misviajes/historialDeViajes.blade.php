@extends('user.userLayout')
@section('title', 'Old Viajes')
@section('headerTitle')
<h1>Historial de Viajes</h1>
@endsection   
@section('content')
<div class="formulary" style="width: 1200px">
    @if($viajes->isNotEmpty())
        @foreach($viajes as $viaje)
            <ul>
                <li>
                    <p>Origen: {{$viaje->origen}} | Destino: {{$viaje->destino}} | Fecha: {{$viaje->fecha}} | Categoria: {{$viaje->categoria}}</p> 
                    <a href="{{route('viewComentariosViaje')}}"><button class="botones" style="width: 300px">Ver Comentarios</button></a>
                </li>
            </ul>
        @endforeach
    @else
        <h2>Compra tu primer pasaje</h2>
        <a href="{{route('buscarViajesDisponibles')}}"><button>Comprar</button></a>
    @endif
</div>
@endsection