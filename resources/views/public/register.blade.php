@extends('public.publicLayout')

@section('title', 'registro')

@section('navTitle', 'Registro')

@section('content')


<div class="formulary">
    
<h2>Registro Basic</h2>
<form action="{{route('guardarRegistro')}}" method="POST" style="display: flex">
    <div>
        <br>
    @csrf
    <strong>
        Nombre:*
        <br>
        <input type="text" name="nombre" value="{{old('nombre')}}" placeholder="carlos.....">
    </strong>
    @error('nombre') 
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
    <br>
    <strong>
        Apellido:*
        <br>
        <input type="text" name="apellido" value="{{old('apellido')}}" placeholder="rodriguez....">
    </strong>
    @error('apellido')
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
    <br>
    <strong>
        DNI:*
        <br>
      
        <input type="number" name="dni" value="{{old('dni')}}" placeholder="987654321....">
    </strong>
    @error('dni')
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
    <br>
    <strong>
        Email:*
        <br>
        
        <input type="email" name="email" value="{{old('email')}}" placeholder="example@gmail.com.....">
    </strong>
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
    <br>
    </div>
    <div style="margin:auto">
        <strong >
            Contrase??a:*
            <br>
            <input type="password" name="contrase??a" value="{{old('contrase??a')}}" placeholder="password......">
        </strong>
        @error('contrase??avalidation')
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
        <br>
        <strong>
            Repetir Contrase??a:*
            <br>
            <input type="password" name="contrase??avalidation" value="{{old('contrase??arepeat')}}" placeholder="password......">
        </strong>
        <br>
        <button type="submit" class="botones">Registrarse</button>
        <br>
        <button onclick=location.href="{{route('registerGolden')}}" type="reset" class="botones">Registro Golden</button>
    </div>
</form>
</div>
@endsection
