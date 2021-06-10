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
    title: '<em>{{$message}}</em>',
    icon: 'success',
    iconColor: '#105671',
    confirmButtonColor: '#105671',
    confirmButtonText: 'ok'
})
</script>
@enderror