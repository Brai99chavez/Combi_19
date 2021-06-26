@extends('admin.layout')
@section('title', 'Home Membresia')
@section('headerTitle', 'Membresias')
@section('content')
<div class="formulary">
    @foreach($membresias as $membresia)
            <strong>Nombre:</strong><br>
            {{$membresia->nombre}}<br>
            <strong>Descuento:</strong><br>
            {{$membresia->descuento}}%<br>
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
@endsection
