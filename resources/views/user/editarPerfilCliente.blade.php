@extends('user.userLayout')

@section('title', 'Editar Perfil')

@section('navTitle')
{{session('nombre')}} {{session('apellido')}}
@endsection
        
@section('content')
<form action="" method="POST" class="formulary">
<h1>Actualizar Datos</h1>
<br>
    @csrf
    <strong>
        Nombre:*
        <br>
        <input type="text" name="nombre" value="{{session('nombre')}}" >
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
        <input type="text" name="apellido" value="{{session('apellido')}}" >
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
        <input type="text" name="dni" value="{{session('dni')}}"  >
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
        <input type="text" name="email" value="{{session('email')}}" >
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
        <input type="password" name="contraseña" value="{{session('contraseña')}}" >
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
        <input type="text" name="tarjeta" value="{{old('tarjeta')}}" >
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
        <input type="text" name="fechaVen" value="{{old('fechaVen')}}" >
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
        <input type="text" name="codigo" value="{{old('codigo')}}" >
    </strong>
    <br>
    @error('codigo')
    <br>
    <small>{{$message}}</small>
    <br>
    @enderror

    <button type="submit"> Actualizar</button>
</form>








 
@error('permiso')
    <small>{{$message}}</small>
@enderror
@endsection