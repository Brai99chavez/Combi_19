@extends('admin.layout')
@section('title','Modificar Ciudad')
@section('headerTitle', 'Modificar Ciudad')
@section('content')
<div class="formulary">    
<form action="{{route('updateciudadprocess')}}" method="POST" >
    @csrf
        @error('nombre')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <strong>nombre</strong><br>
        <input name="nombre" type="text" value="{{$ciudades[0]->nombre}}"><br>
        @error('direccion')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <strong>direccion:</strong><br>
        <input name="direccion" type="text" value="{{$ciudades[0]->direccion}}"><br>
        @error('disponible')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <strong>disponible:</strong><br>
        <select name="disponible" id="" value="{{$ciudades[0]->disponible}}">
            <option value="1">SI</option>
            <option value="0">NO</option>
        </select>

        <input type="hidden" name="id_ciudad" value="{{$ciudades[0]->id_ciudad}}">
        <button class="botones" type="submit">Modificar Ciudad</button>
    </form>
</div>
@endsection