@extends('public.publicLayout')


@section('title', 'login')

@section('navTitle', 'Login')

@section('content')
    
    <form action="{{route('autenticacion')}}" method="POST" class="formulary" >
        @csrf
        <strong for="email">email:</strong>
        <br>
        <input type="text" name="email" placeholder="Example@gmail.com..." value="{{old('email')}}">
        @error('email')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <br>
        <strong>contraseña:</strong>
        <br>
        <input type="password" name="contraseña" placeholder="Example123password...." >
        @error('contraseña')
            <br>
            <small>{{$message}}</small>
            <br>
        @enderror
        <br>
        <button type="submit" class="botones" >Iniciar Sesion</button>
        @error('log')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
    </form>
@endsection