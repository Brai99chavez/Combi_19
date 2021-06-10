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
                <li style="list-style:none">
                    <p>Origen: {{$viaje->origen}} | Destino: {{$viaje->destino}} | Fecha: {{$viaje->fecha}} | Categoria: {{$viaje->categoria}}</p>
                    <form action="{{route('viewComentariosViaje')}}" method="GET">
                        <input type="hidden" name="id_viaje" value="{{$viaje->id_viaje}}">
                        <button type="submit" class="botones" style="width: 300px">Ver Comentarios</button>
                    </form> 
                </li>
            </ul>
        @endforeach
    @else
        <h2>Compra tu primer pasaje</h2>
        <a href="{{route('buscarViajesDisponibles')}}"><button class="botones">Comprar</button></a>
    @endif
</div>
@endsection