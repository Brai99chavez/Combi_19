@extends('admin.layout')

@section('title', 'Registro Viaje')

@section('headerTitle', 'Registro Viaje')

@section('content')
<div class="formulary">
    <h2>Ingrese la fecha de viaje</h2>
        <form action="{{route('createviaje')}}" method="GET">
            @csrf
            <input type="hidden" name="ladeHoy" value="{{date("Y-m-d")}}">
            <input type="date" name="fecha"><br><br>
            <button type="submit" class="botones">Verificar disponibilidad</button>
        </form>
    </div>
    @error('fecha')
        <script>
            Swal.fire({
            title: '{{$message}}',
            icon: 'success',
            iconColor: '#105671',
            confirmButtonColor: '#105671',
            confirmButtonText: 'ok'
        })
        </script>
    @enderror
@endsection
