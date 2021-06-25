@extends('user.userLayout')
@section('title', 'Actualizar Comentario')
@section('headerTitle')
<h1>Modificar Comentario</h1>
@endsection   
@section('content')
<div class="formulary">
    <form action="{{route('updateComentarioProcess')}}" method="POST">
        @csrf
        <input type="hidden" value="{{$id_viaje}}" name="id_viaje">
        <input type="hidden" value="{{$comentario[0]->id_comentario}}" name="id_comentario">
        <textarea name="descripcion"cols="30" rows="10">{{$comentario[0]->descripcion}}</textarea>
        <button type="submit" class="botones">Modificar</button>
    </form>
</div>
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