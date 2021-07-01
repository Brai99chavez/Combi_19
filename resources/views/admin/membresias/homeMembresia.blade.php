@extends('admin.layout')
@section('title', 'Home Membresia')
@section('headerTitle', 'Membresias')
@section('content')
<div class="formulary">
    <div>
        @foreach($membresias as $membresia)
        <h2>Nombre:</h2>
        {{$membresia->nombre}}
        <h2>Descuento:</h2>
        {{$membresia->descuento}}%
        <form action="{{route('updatemembresias')}}" method="POST">
            @csrf
            <input type="hidden" name="id_membresia"value="{{$membresia->id_membresia}}">
            <button type="submit" class="botones">Modificar</button>
        </form>
        <br>
@endforeach
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
    </div>
</div>
@endsection
