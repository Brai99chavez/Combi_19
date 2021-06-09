@extends('admin.layout')
@section('title', 'Update Membresia')
@section('headerTitle', 'Modificar Membresia')
@section('content')
    <div class="formulary">
        <form action="{{route('updatemembresiasprocess')}}" method="POST">
            @csrf
            <input type="hidden" name="id_membresia" value="{{$membresia[0]->id_membresia}}">
            <input type="text" name="nombre" value="{{$membresia[0]->nombre}}">
            <input type="text" name="descuento" value="{{$membresia[0]->descuento}}">
            <button type="submit" class="botones">ENVIAR</button>
        </form>
    </div>
@endsection
@error('updateprocess')
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