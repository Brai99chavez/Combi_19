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
        <strong for="email">email:</strong>
        <br>
        <input type="text" name="email" placeholder="Example@gmail.com..." value="{{old('email')}}">
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
        <br>
        <strong>contraseña:</strong>
        <br>
        <input type="password" name="contraseña" placeholder="Example123password...." >
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
        <br>
        <button type="submit" class="botones" >Iniciar Sesion</button>
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
    </form>
@endsection