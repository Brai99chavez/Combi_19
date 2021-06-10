@extends('admin.layout')
@section('title','Registro Combi')
@section('headerTitle', 'Registro Combi')
@section('content')
<div class="formulary">    
<form action="{{route('createcombisprocess')}}" method="POST" >
    @csrf
        @error('patente')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <strong>Patente</strong><br>
        <input name="patente" type="text" ><br>
        @error('modelo')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <strong>Modelo:</strong><br>
        <input name="modelo" type="text"><br>
        @error('color')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <strong>Color:</strong><br>
        <input name="color" type="text"><br>
        @error('cant_asientos')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <strong>Cantidad Asientos:</strong><br>
        <input name="cant_asientos" type="text"><br>
        @error('categoria')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <strong>Categoria:</strong><br>
        <select name="id_categoria" id="">
            <option value="1">Comoda</option>
            <option value="2">Super Comoda</option>
        </select>
        <br>
        @error('disponible')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <button class="botones" type="submit">Cargar Combi</button>
    </form>
</div>
@endsection