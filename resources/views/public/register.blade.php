@extends('public.layout')

@section('title', 'registro')

@section('content')

    
    <h1>
        soy el registro padre
    </h1>
    <form action="{{route('saveRegister')}}" method="POST">
        @csrf


        <label>
            Nombre:
            <input type="text" name="nombre" value="{{old('nombre')}}">
        </label>
        @error('nombre')
            <br>
            <small>{{$message}}</small>
            <br>
        @enderror
        <br>


        <label>
            Apellido:
            <input type="text" name="apellido" value="{{old('apellido')}}">
        </label>
        @error('apellido')
        <br>
            <small>{{$message}}</small>
        <br>
        @enderror
        <br>


        <label>
            dni:
            <input type="text" name="dni" value="{{old('dni')}}">
        </label>
        @error('dni')
        <br>
            <small>{{$message}}</small>
        <br>
        @enderror
        <br>


        <label>
            Email:
            <input type="text" name="email" value="{{old('email')}}">
        </label>
        @error('email')
        <br>
            <small>{{$message}}</small>
        <br>
        @enderror
        <br>


        <label>
            Contraseña:
            <input type="password" name="contraseña" value="{{old('contraseña')}}">
        </label>
        @error('contraseña')
        <br>
            <small>{{$message}}</small>
        <br>
        @enderror
        <br>


        <button type="submit"> Registrarse</button>
    </form>
@endsection