@extends('admin.layout')
@section('title', 'Create Insumo')
@section('content')
    <h2>Nuevo Insumo</h2>
    <form action="{{route('createinsumoshow')}}" method="POST" class="formulary">
        @csrf

            <strong>NOMBRE:</strong>
            <br>
            <input type="text" name="nombre">
            <br>
            @error('nombre')
                <small>{{$message}}</small>
            @enderror
            <br>
            <strong>PRECIO:</strong>
            <br>
            <input type="number" name="precio">
            <br>
            @error('precio')
            <small>{{$message}}</small>
            @enderror
            <br>
            <strong>DESCRIPCION</strong>
            <br>
            <input type="text" name="descripcion">
            <br>
            <strong>DISPONIBLE</strong>
            <br>
            <select name="disponible" id="" >
                <option value="0">NO</option>
                <option value="1">SI</option>
            </select>
            <br>
        <button class="botones" type="submit">CARGAR INSUMO</button>
    </form>
@endsection