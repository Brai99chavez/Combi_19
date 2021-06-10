@extends('user.userLayout')
@section('title', 'Old Viajes')
@section('headerTitle')
<h1>Historial de Viajes</h1>
@endsection   
@section('content')
<div class="formulary" style="width: 1200px">
    @if($viajes->isNotEmpty())
    <ul>
        @foreach($viajes as $viaje)
            <hr>
            <p>Origen: {{$viaje->origen}} | Destino: {{$viaje->destino}} | Fecha: {{$viaje->fecha}} | Categoria: {{$viaje->categoria}}</p>
            <form action="{{route('viewComentariosViaje')}}" method="GET">
                <input type="hidden" name="id_viaje" value="{{$viaje->id_viaje}}">
                <button type="submit" class="botones" style="width: 300px">Ver Comentarios</button>
            </form> 
        @endforeach
    </ul>
    @else
        <h2>Compra tu primer pasaje</h2>
        <a href="{{route('buscarViajesDisponibles')}}"><button class="botones">Comprar</button></a>
    @endif
</div>
@error('success')
<script>
    Swal.fire({
        icon: 'warning',
        iconColor: '#48C9B0',
        title: '<strong style= "color: white; font-family: arial;">{{$message}}</strong>',
        background:'#404040',
        confirmButtonColor: '#45B39D ',
        confirmButtonText: 'Got it!' ,
    })
</script>
@enderror
@endsection