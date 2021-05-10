@extends('public.publicLayout')

@section('title', 'registro')

@section('content')

    
    <h1>
        soy el registro padre
    </h1>
    <p>
        si ingresa tarjeta sera usuario golden y
        tendra acceso a descuentos
    </p>
    <form action="{{route('saveRegister')}}" method="POST">
        @csrf


        <label>
            Nombre:*
            <br>
            <input type="text" name="nombre" value="{{old('nombre')}}">
        </label>
        @error('nombre')
            <br>
            <small>{{$message}}</small>
            <br>
        @enderror
        <br>


        <label>
            Apellido:*
            <br>
            <input type="text" name="apellido" value="{{old('apellido')}}">
        </label>
        @error('apellido')
        <br>
            <small>{{$message}}</small>
        <br>
        @enderror
        <br>


        <label>
            dni:*
            <br>
            <input type="text" name="dni" value="{{old('dni')}}">
        </label>
        @error('dni')
        <br>
            <small>{{$message}}</small>
        <br>
        @enderror
        <br>

        <label>
            tarjeta: (opcional)
            <br>
            <input type="text" name="tarjeta" value="{{old('tarjeta')}}">
        </label>
        <br>

        <label>
            Email:*
            <br>
            <input type="text" name="email" value="{{old('email')}}">
        </label>
        @error('email')
        <br>
            <small>{{$message}}</small>
        <br>
        @enderror
        <br>

        <label>
            Contraseña:*
            <br>
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