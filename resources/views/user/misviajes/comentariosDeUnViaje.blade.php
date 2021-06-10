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

        @endforeach

    @else
        <em>Se el primero en agregar un comentario...</em>  
    @endif
</div>
@error('sucess')
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