@extends('user.userLayout')
@section('title', 'Old Viajes')
@section('headerTitle')
<h1>Historial de Viajes</h1>
@endsection   
@section('content')
<div class="formulary">
    <h2>¿Qué te parecio el viaje?</h2>
    <form action="{{route('guardarComentario')}}" method="post" >
        @csrf
        <input type="hidden" name="id_viaje" value="{{$id_viaje}}">
        <textarea name="descripcion" cols="20" rows="" placeholder="escriba un comentario..." style="min-width: 100%"></textarea>
        <button type="submit" class="botones">Publicar Comentario</button>
    </form>
    <br>
    <h2>Comentarios</h2>
    @if($comentarios->isNotEmpty())
        @foreach($comentarios as $com)
            <hr>
                <em>{{$com->nombre}} {{$com->apellido}} | {{$com->created_at}}</em>
                <br><br>
                {{$com->descripcion}} 
                <br><br>
            @if($com->id_usuario == session('id_usuario'))
                <form action="{{route('updateComentario')}}" method="GET">
                    <input type="hidden" value="{{$id_viaje}}" name="id_viaje">
                    <input type="hidden" value="{{$com->id_comentario}}" name="id_comentario">
                    <button type="submit" class="botones" style="width: 150px">Modificar</button>
                </form>
                <form action="{{route('deleteComentario')}}" method="GET">
                    <input type="hidden" value="{{$id_viaje}}" name="id_viaje">
                    <input type="hidden" value="{{$com->id_comentario}}" name="id_comentario">
                    <button type="submit" class="botones" style="width: 150px">Eliminar</button>
                </form>    
            @endif
        @endforeach
    @else
        <small><em>Agrega tu primer comentario...</em></small>
    @endif
</div>
@error('success')
    <script>
        Swal.fire({
        title: '<em>{{$message}}</em>',
        icon: 'error',
        iconColor: '#105671',
        confirmButtonColor: '#105671',
        confirmButtonText: 'ok'
    })
    </script>
@enderror
@error('descripcion')
    <script>
        Swal.fire({
        title: '<em>{{$message}}</em>',
        icon: 'error',
        iconColor: '#105671',
        confirmButtonColor: '#105671',
        confirmButtonText: 'ok'
    })
    </script>
@enderror
@endsection