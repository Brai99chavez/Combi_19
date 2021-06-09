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
            icon: 'warning',
            iconColor: '#48C9B0',
            title: '<strong style= "color: white; font-family: arial;">{{$message}}</strong>',
            background:'#404040',
            confirmButtonColor: '#45B39D ',
            confirmButtonText: 'Got it!' ,
        })
    </script>
@enderror
</div>
@endsection
