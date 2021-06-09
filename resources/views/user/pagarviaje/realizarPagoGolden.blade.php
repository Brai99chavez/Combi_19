@extends('user.userLayout')
@section('title', 'Pago de Tarjeta')
@section('headerTitle')
<h1>Pago de Pasajes</h1>
@endsection  
@section('content')
<div class="formulary">
<form action="{{route('crearPasajeYPago')}}" method="POST">
    <h1>Pago de Pasaje</h1>
        @csrf
         <br>
        <strong>
            Num. de tarjeta: 
            <br>
            <input type="text" name="tarjeta" value="" placeholder="12345678">
        </strong>
        <br>
        
        <br>
        <strong>
            Fecha de venc. de tarjeta: 
            <br>
            <input type="text" name="fechaVenc" value="" placeholder="23/02">
        </strong>
        <br><br>
        <strong>
            cod. de tarjeta: 
            <br>
            <input type="text" name="codigo" value="" placeholder="876">
            <input type="hidden" name="id_viaje" value="{{$id_viaje}}">                      
        </strong>
        <br><br>
        <button type="submit" class="botones"> Confirmar Compra </button>
        <br>
        <a href="{{route('viajesDisponibles')}}">cancelar</a>
    </form>
</div>
@error('codigo')
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
@error('fechaVenc')
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
@error('tarjeta')
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