@extends('public.publicLayout')


@section('title', 'login')

@section('navTitle', 'Login')

@section('content')
@error('sucess')
<script>
    Swal.fire({
        icon: 'warning',
        iconColor: '#48C9B0',
        title: '<strong style= "color: white; font-family: arial;"> {{$message}} </strong>',
        background:'#404040',
        confirmButtonColor: '#45B39D ',
        confirmButtonText: 'Got it!' ,
    })
</script>
@enderror
    <form action="{{route('autenticacion')}}" method="POST" class="formulary" >
        @csrf
        <strong for="email">Email</strong>
        <br>
        <input type="text" name="email" placeholder="" value="{{old('email')}}">
        
        <br>
        <strong>Contraseña</strong>
        <br>
        <input type="password" name="contraseña" placeholder="" >
        <br>
        <button type="submit" class="botones" >Iniciar Sesion</button>
    </form>
@error('contraseña')
    <script>
        Swal.fire({
            icon: 'warning',
            iconColor: '#48C9B0',
            title: '<strong style= "color: white; font-family: arial;"> {{$message}}</strong>',
            background:'#404040',
            confirmButtonColor: '#45B39D ',
            confirmButtonText: 'Got it!' ,
        })
    </script>
@enderror
@error('log')
    <script>
        Swal.fire({
            icon: 'warning',
            iconColor: '#48C9B0',
            title: '<strong style= "color: white; font-family: arial;"> {{$message}}</strong>',
            background:'#404040',
            confirmButtonColor: '#45B39D ',
            confirmButtonText: 'Got it!' ,
        })
    </script>
@enderror
@error('email')
    <script>
        Swal.fire({
            icon: 'warning',
            iconColor: '#48C9B0',
            title: '<strong style= "color: white; font-family: arial;"> {{$message}}</strong>',
            background:'#404040',
            confirmButtonColor: '#45B39D ',
            confirmButtonText: 'Got it!' ,
        })
    </script>
@enderror
@endsection