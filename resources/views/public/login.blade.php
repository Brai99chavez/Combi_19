@extends('public.publicLayout')


@section('tittle', 'login')

@section('content')
    <h1>
        login
    </h1>
    <form action="{{route('autenticacion')}}" method="POST">
        @csrf
        <label for="email">email:</label>
        <br>
        <input type="email" name="email" placeholder="Email....">
        @error('email')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <br>
        <label for="contraseña">contraseña:</label>
        <br>
        <input type="password" name="contraseña" placeholder="contraseña">
        @error('contraseña')
            <br>
            <small>{{$message}}</small>
            <br>
        @enderror
        <br>
        <button type="submit">login</button>
    </form>
@endsection