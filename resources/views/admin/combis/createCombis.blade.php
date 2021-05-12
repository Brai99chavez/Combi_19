@extends('admin.layout')
@section('title','Registro Combi')
@section('headerTitle', 'Registro Combi')

@section('content')
    <form action="">
        @error('patente')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <strong>patente</strong><br>
        <input name="patente" type="text"><br>
        @error('modelo')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <strong>modelo:</strong><br>
        <input name="modelo" type="text"><br>
        @error('color')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <strong>color:</strong><br>
        <input name="color" type="text"><br>
        @error('cant_asientos')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <strong>asientos:</strong><br>
        <input name="cant_asientos" type="text"><br>
        @error('categoria')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <strong>categoria:</strong><br>
        <select name="id_categoria" id="">
            <option value="1">Comoda</option>
            <option value="2">Super Comoda</option>
        </select>
        @error('disponible')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <strong>disponible:</strong><br>
        <select name="disponible" id="">
            <option value="1">SI</option>
            <option value="2">NO</option>
        </select>

        <button type="submit">Registrar Combi</button>

    </form>
@endsection