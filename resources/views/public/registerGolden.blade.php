@extends('public.publicLayout')

@section('title', 'registro Golden')

@section('navTitle', 'Registro Golden')

@section('content')

<form action="{{route('guardarRegistroGolden')}}" method="post" class="formulary">
    @csrf
    <h1>Datos de Usuario</h1>
    <br>
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
        dni:*
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
    <strong>
        Contraseña:*
        <br>
        <input type="password" name="contraseña" value="{{old('contraseña')}}" placeholder="password......">
    </strong>
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
    <br>
   <h1>Datos de Tarjeta</h1>
    <br>
    <strong>
        Num. de tarjeta: 
        <br>
        <input type="text" name="tarjeta" value="{{old('tarjeta')}}" placeholder="123456789....">
    </strong>
    <br>
    @error('tarjeta')
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
        Fecha de venc. de tarjeta: 
        <br>
        <input type="text" name="fechaVenc" value="{{old('fechaVenc')}}" placeholder="01/07..">
    </strong>
    <br>
    @error('fechaVenc')
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
        cod. de tarjeta: 
        <br>
        <input type="text" name="codigo" value="{{old('codigo')}}" placeholder="456..">
    </strong>
    <br>
    @error('codigo')
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
    <button type="submit" class="botones">  REGISTRARSE  </button>
</form>
@endsection
