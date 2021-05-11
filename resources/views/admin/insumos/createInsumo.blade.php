@extends('admin.layout')
@section('title', 'Create Insumo')
@section('content')
    <h2>Nuevo Insumo</h2>
    <form action="{{route('createinsumoshow')}}" method="POST" >
        @csrf
        <label>
            NOMBRE:
            <input type="text" name="nombre">
        </label>
        <label>
            PRECIO:
            <input type="number" name="precio">
        </label>
        <label>
            DESCRIPCION
            <input type="text" name="descripcion">
        </label>
        <label>
            DISPONIBLE
            <input type="number" name="disponible" placeholder="1 SI / 0 NO" >
        </label>
        <button type="submit">CARGAR INSUMO</button>
    </form>
@endsection