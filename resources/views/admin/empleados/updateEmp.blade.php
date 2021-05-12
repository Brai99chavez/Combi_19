@extends('admin.layout')

@section('title', 'Modificar Empleado')

@section('headerTitle', 'Modificar Empleado')

@section('content')
    <form action="{{route('saveEmp')}}" method="POST" class="formulary">
        @csrf
        <strong>Nombre:*</strong><br>
        <input type="text" name="nombre" placeholder="Example:Juan..." value="{{$usuario[0]->nombre}}"><br>

        <br>
        <strong>Apellido:*</strong><br>
        <input type="text" name="apellido" placeholder="Example:marquez..." value="{{$usuario[0]->apellido}}"><br>

        <br>
        <strong>dni:*</strong><br>
        <input type="text" name="dni" placeholder="Example:123456789..." value="{{$usuario[0]->dni}}"><br>

        <br>
        <strong>Email:*</strong><br>
        <input type="email" name="email" placeholder="Example@gmail.com" value="{{$usuario[0]->email}}"><br>

        <br>
        <strong>Contraseña:*</strong><br>
        <input type="password" name="contraseña" placeholder="***********" value="{{$usuario[0]->contraseña}}"><br>
        <br>
        <strong>Rol:*</strong><br>
        <select name="rol" id="">
            <option value="2" >chofer</option>
            <option value="3" >admin</option>
        </select>
        <button class="botones" type="submit">modificar</button>
    </form>
@endsection