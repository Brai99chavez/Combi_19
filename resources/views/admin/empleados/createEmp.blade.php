@extends('admin.layout')

@section('title', 'registrar Empleado')

@section('headerTitle', 'Regitro Empleado')

@section('content')
    <form action="{{route('saveRegister')}}" method="POST" class="formulary">
        @csrf
        @error('nombre')
            <small>{{$message}}</small>
        @enderror
        <br>
        <strong>Nombre:*</strong><br>
        <input type="text" name="nombre" placeholder="Example:Juan..." value="{{old('nombre')}}"><br>
        <br>
        @error('apellido')
            <small>{{$message}}</small>
        @enderror
        <br>
        <strong>Apellido:*</strong><br>
        <input type="text" name="apellido" placeholder="Example:marquez..." value="{{old('apellido')}}"><br>
        @error('dni')
            <small>{{$message}}</small>
        @enderror
        <br>
        <strong>dni:*</strong><br>
        <input type="text" name="dni" placeholder="Example:123456789..." value="{{old('dni')}}"><br>
        @error('email')
            <small>{{$message}}</small>
        @enderror
        <br>
        <strong>Email:*</strong><br>
        <input type="email" name="email" placeholder="Example@gmail.com" value="{{old('email')}}"><br>
        @error('contraseña')
            <small>{{$message}}</small>
        @enderror
        <br>
        <strong>Contraseña:*</strong><br>
        <input type="password" name="contraseña" placeholder="***********" value="{{old('contraseña')}}"><br>
        <br>
        <strong>Rol:*</strong><br>
        <select name="rol" id="">
            <option value="2" >chofer</option>
            <option value="3" >admin</option>
        </select>
        <button class="botones" type="submit">Registrar</button>
    </form>
@endsection