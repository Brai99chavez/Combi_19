@extends('public.layout')

@section('tittle', 'registro')

@section('content')

    
    <h1>
        soy el registro padre
    </h1>
    <form action="{{route('saveRegister')}}" method="POST">
        @csrf
        <label>
            Nombre:
            <input type="text" name="nombre">
        </label>
        <br>
        <label>
            Apellido:
            <input type="text" name="apellido">
        </label>
        <br>
        <label>
            dni:
            <input type="text" name="dni">
        </label>
        <br>
        <label>
            Email:
            <input type="text" name="email">
        </label>
        <br>
        <label>
            Contraseña:
            <input type="password" name="contraseña">
        </label>
        <br>
        <button type="submit"> Registrase</button>
    </form>
@endsection