@extends('public.publicLayout')

@section('title', 'registro')

@section('navTitle', 'Registro')

@section('content')



<form action="{{route('saveRegister')}}" method="POST" class="formulary">
    @csrf
    
    <strong>
        Nombre:*
        <br>
        <input type="text" name="nombre" value="{{old('nombre')}}" placeholder="carlos.....">
    </strong>
    @error('nombre')
    <br>
    <small>{{$message}}</small>
    <br>
    @enderror
    <br>


    <strong>
        Apellido:*
        <br>
        <input type="text" name="apellido" value="{{old('apellido')}}" placeholder="rodriguez....">
    </strong>
    @error('apellido')
    <br>
    <small>{{$message}}</small>
    <br>
    @enderror
    <br>


    <strong>
        dni:*
        <br>
        <input type="text" name="dni" value="{{old('dni')}}" placeholder="987654321....">
    </strong>
    @error('dni')
    <br>
    <small>{{$message}}</small>
    <br>
    @enderror
    <br>

    <strong>
        tarjeta: (opcional)
        <br>
        <input type="text" name="tarjeta" value="{{old('tarjeta')}}" placeholder="123456789....">
    </strong>
    <br>

    <strong>
        Email:*
        <br>
        <input type="text" name="email" value="{{old('email')}}" placeholder="example@gmail.com.....">
    </strong>
    @error('email')
    <br>
    <small>{{$message}}</small>
    <br>
    @enderror
    <br>

    <strong>
        Contraseña:*
        <br>
        <input type="password" name="contraseña" value="{{old('contraseña')}}" placeholder="password......">
    </strong>
    @error('contraseña')
    <br>
    <small>{{$message}}</small>
    <br>
    @enderror
    <br>


    <button type="submit"> Registrarse</button>
</form>
@endsection
