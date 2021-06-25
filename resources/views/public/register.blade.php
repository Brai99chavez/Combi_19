@extends('public.publicLayout')

@section('title', 'registro')

@section('navTitle', 'Registro')

@section('content')


<div class="formulary">
    
<h1>Registrar Como Basic</h1>
<form action="{{route('guardarRegistro')}}" method="POST">
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
    <button type="submit" class="botones"> Registrarse</button>

</form>
<a href="{{route('registerGolden')}}"><button class="botones">Registrar Como Golden</button></a>

<h3>* Si se registra como golden tendra un Descuento de 10% en cada compra de pasaje</h3>

</div>
@endsection
