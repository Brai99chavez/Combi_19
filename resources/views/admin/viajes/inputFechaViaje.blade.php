@extends('admin.layout')

@section('title', 'Registro Viaje')

@section('headerTitle', 'Registro Viaje')

@section('content')
<div class="formulary">
    <h2>Ingrese la fecha de viaje</h2>
        <form action="{{route('createviaje')}}" method="GET">
            @csrf
            <input type="date" name="fechaValidation">
            <button type="submit">Verificar disponibilidad</button>
        </form>
    </div>
@endsection
