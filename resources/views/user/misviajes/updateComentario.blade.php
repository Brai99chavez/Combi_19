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