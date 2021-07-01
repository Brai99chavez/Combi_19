@extends('user.userLayout')

@section('title', 'Editar Perfil')

@section('headerTitle')
<h1>Actualizar Datos</h1>
@endsection
        
@section('content')
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
<?php

use App\Models\Usuarios;
?>
<div class="formulary"> 
<form action="{{route('saveEmp')}}" method="POST" >
<h2>Actualizar Datos</h2>
<br>
    @csrf
    <strong>
        Nombre:*
        <br>
        <input type="text" name="nombre" value="{{$usuario[0]->nombre}}" > 
        <input type="hidden" name="id_usuario" value="{{$usuario[0]->id_usuario}}" > 
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
        <input type="text" name="apellido" value="{{$usuario[0]->apellido}}" >
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
        <input type="text" name="dni" value="{{$usuario[0]->dni}}"  >
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
        <input type="text" name="email" value="{{$usuario[0]->email}}" >
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
        <input type="password" name="contraseña" value="{{$usuario[0]->contraseña}}" >
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
    <button type="submit" class="botones">Guardar Cambios</button>
    
</form>
<button type="reset" onclick=location.href="{{route('updateMembresiaCliente')}}" class="botones">Modificar Membresia</button>
</div>

@error('permiso')
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