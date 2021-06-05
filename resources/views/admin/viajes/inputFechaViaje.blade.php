@extends('admin.layout')

@section('title', 'Registro Viaje')

@section('headerTitle', 'Registro Viaje')

@section('content')
<div class="formulary">
    <h2>Ingrese la fecha de viaje</h2>
        <form action="{{route('createviaje')}}" method="GET">
            @csrf
            <input type="hidden" name="ladeHoy" value="{{date("Y-m-d")}}">
            <input type="date" name="fecha">
            <button type="submit">Verificar disponibilidad</button>
        </form>
    </div>
    @error('fecha')
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
