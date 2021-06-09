@extends('user.userLayout')

@section('title', 'Pago de Tarjeta')

@section('navTitle')
{{session('nombre')}} {{session('apellido')}}
@endsection
        
@section('content')
<form action="{{route('crearPasajeYPago')}}" method="POST" class="formulary">
<h1>Pago de Pasaje</h1>
    @csrf
     <br>
    <strong>
        Num. de tarjeta: 
        <br>
        <input type="text" name="tarjeta" value="" placeholder="12345678">
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
        <input type="text" name="fechaVenc" value="" placeholder="23/02">
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
        <input type="text" name="codigo" value="" placeholder="876">
        <input type="hidden" name="id_viaje" value="{{$id_viaje}}">                                   
    </strong>
    <br>
    @error('codigo')
    <br>
    <small>{{$message}}</small>
    <br>
    @enderror
    <br>
    <button type="submit" class="botones"> Confirmar Compra </button>
    <br>
    <a href="{{route('viajesDisponibles')}}">cancelar</a>
</form>
@error('sucess')
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
@error('permiso')
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
