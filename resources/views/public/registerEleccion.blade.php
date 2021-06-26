
@extends('public.publicLayout')

@section('title', 'registro')

@section('navTitle', 'Registro')

@section('content')

<div class="formulary">
    <i><h1>Eliga una membresia</h1></i>
       <a href="{{route('register')}}"><button type="submit"  class="botones">Registrar como BASIC</button></a>
       <a href="{{route('registerGolden')}}"><button type="submit"  class="botones">Registrar como GOLDEN</button></a>
       <br>
       <h3>- si selecciona registrar como BASIC , tendra todas las funcionalidades de un usuario comun </h3>
       <h3>- si selecciona registrar como GOLDEN, tendra todas las funcionalidades de un usuario comun y Tendra  un descuento de 10% en cada viaje </h3>
       <small>*para ser usuario Golden debera registrar una tarjeta valida</small>
</div>

@endsection
