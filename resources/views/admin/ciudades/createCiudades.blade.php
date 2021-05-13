@extends('admin.layout')
@section('title','Registro Ciudad')
@section('headerTitle', 'Registro Ciudad')
@section('content')
<div class="formulary">    
<form action="{{route('createciudadprocess')}}" method="POST" >
    @csrf
        @error('nombre')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <strong>nombre</strong><br>
        <input name="nombre" type="text" ><br>
        @error('direccion')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <strong>direccion:</strong><br>
        <input name="direccion" type="text"><br>
        @error('disponible')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <strong>disponible:</strong><br>
        <select name="disponible" id="">
            <option value="1">SI</option>
            <option value="0">NO</option>
        </select>

        <button class="botones" type="submit">Registrar Ciudad</button>

    </form>
</div>
@endsection