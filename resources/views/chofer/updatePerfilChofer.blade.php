@extends('chofer.choferLayout')
@section('title', 'Home Chofer')
@section('headerTitle')
<h1>Editar Perfil</h1>
@endsection   
@section('content')

<div class="formulary"> 
<form action="{{route('updateChoferProcess')}}" method="POST" >
<h2>Actualizar Datos</h2>
<br>
    @csrf
    <strong>
        Nombre
        <br>
        <input type="text" name="nombre" value="{{$usuario[0]->nombre}}" > 
    </strong>
    <br>
    <strong>
        Apellido
        <br>
        <input type="text" name="apellido" value="{{$usuario[0]->apellido}}" >
    </strong>
    <br>
    <strong>
        DNI
        <br>
        <input type="text" name="dni" value="{{$usuario[0]->dni}}" disabled>
    </strong>
    <br>
    <strong>
        Email
        <br>
        <input type="text" name="email" value="{{$usuario[0]->email}}" >
    </strong>
    <br>
    <button type="submit" class="botones">Guardar Cambios</button>
</form>
@error('sucess')
    <script>
        Swal.fire({
        title: '<em>{{$message}}</em>',
        icon: 'success',
        iconColor: '#105671',
        confirmButtonColor: '#105671',
        confirmButtonText: 'ok'
    })
    </script>
@enderror
@error('error')
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
@endsection