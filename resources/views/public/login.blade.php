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
    <div class="formulary" style="width: 60vh;">
        <h2>Login</h2>
        <form action="{{route('autenticacion')}}" method="POST" " >
            @csrf
            <strong for="email">Email</strong>
            <br>
            <input type="email" name="email" placeholder="example@gmail.com" value="{{old('email')}}">
            
            <br>
            <strong>Contraseña</strong>
            <br>
            <input type="password" name="contraseña" placeholder="**********" >
            <br>
            <button type="submit" class="botones" >Iniciar Sesion</button>
        </form>
    </div>
@error('contraseña')
    <script>
        Swal.fire({
        title: '<em>{{$message}}</em>',
        icon: 'error',
        iconColor: '#105671',
        confirmButtonColor: '#105671',
        confirmButtonText: 'ok'
    })
    </script>
@enderror
@error('log')
    <script>
        Swal.fire({
        title: '<em>{{$message}}</em>',
        icon: 'error',
        iconColor: '#105671',
        confirmButtonColor: '#105671',
        confirmButtonText: 'ok'
    })
    </script>
@enderror
@error('email')
    <script>
        Swal.fire({
        title: '<em>{{$message}}</em>',
        icon: 'error',
        iconColor: '#105671',
        confirmButtonColor: '#105671',
        confirmButtonText: 'ok'
    })
    </script>
@enderror
@endsection