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

                    {{$com->nombre}} {{$com->apellido}} - realizado:{{$com->created_at}}
                    <br>
                    Comentario: {{$com->descripcion}} 
                    <br>

        @endforeach
    @else
        <h2>Se el primero en agregar un comentario...</h2>  
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