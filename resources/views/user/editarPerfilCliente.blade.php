@extends('user.userLayout')

@section('title', 'Editar Perfil')

@section('navTitle')
{{session('nombre')}} {{session('apellido')}}
@endsection
        
@section('content')
@error('sucess')
        <script>
            Swal.fire({
                icon: 'warning',
                iconColor: '#48C9B0',
                title: '<strong style= "color: white; font-family: arial;">{{$message}}</strong>',
                background:'#404040',
                confirmButtonColor: '#45B39D ',
                confirmButtonText: 'Got it!' ,
            })
        </script>
    @enderror
<?php

use App\Models\Usuarios;
$usuario = Usuarios::where('id_usuario','=', session('id_usuario'))->get();

?>

<form action="{{route('saveCli')}}" method="POST" class="formulary">
<h1>Actualizar Datos</h1>
<br>
    @csrf
    <strong>
        Nombre:*
        <br>
        <input type="text" name="nombre" value="{{$usuario[0]->nombre}}" > 
        <input type="hidden" name="id_usuario" value="{{$usuario[0]->id_usuario}}" > 
    </strong>
    @error('nombre')
    <br>
    <small>{{$message}}</small>
    <br>
    @enderror
    <br>
    <strong>
        Apellido:*
        <br>
        <input type="text" name="apellido" value="{{$usuario[0]->apellido}}" >
    </strong>
    @error('apellido')
    <br>
    <small>{{$message}}</small>
    <br>
    @enderror
    <br>
    <strong>
        dni:*
        <br>
        <input type="text" name="dni" value="{{$usuario[0]->dni}}"  >
    </strong>
    @error('dni')
    <br>
    <small>{{$message}}</small>
    <br>
    @enderror
    <br>
    <strong>
        Email:*
        <br>
        <input type="text" name="email" value="{{$usuario[0]->email}}" >
    </strong>
    @error('email')
    <br>
    <small>{{$message}}</small>
    <br>
    @enderror
    <br>
    <strong>
        Contraseña:*
        <br>
        <input type="password" name="contraseña" value="{{$usuario[0]->contraseña}}" >
    </strong>
    @error('contraseña')
    <br>
    <small>{{$message}}</small>
    <br>
    @enderror
    <br> 

     <h1>Actualizar datos de tarjeta si es Usuario GOLDEN</h1> <!-- EDITAR USUARIO GOLDEN------------------- -->

     <br>
    <strong>
        Num. de tarjeta: 
        <br>
        <input type="text" name="tarjeta" value="{{$usuario[0]->tarjeta}}" >
    </strong>
    <br>
    @error('tarjeta')
    <br>
    <small>{{$message}}</small>
    <br>
    @enderror
    <br>
    <strong>
        Fecha de venc. de tarjeta: 
        <br>
        <input type="text" name="fechaVenc" value="{{$usuario[0]->fechaVenc}}" >
    </strong>
    <br>
    @error('fechaVenc')
    <br>
    <small>{{$message}}</small>
    <br>
    @enderror
    <br>
    <strong>
        cod. de tarjeta: 
        <br>
        <input type="text" name="codigo" value="{{$usuario[0]->codigo}}" >
    </strong>
    <br>
    @error('codigo')
    <br>
    <small>{{$message}}</small>
    <br>
    @enderror

    <h3>(si desea ser Usuario GOLDEN ingrese datos de una tarjeta valida)</h3>

    <button type="submit" class="botones">    ACTUALIZAR   </button>
</form>



 
@error('permiso')
    <small>{{$message}}</small>
@enderror
@endsection