
@extends('public.publicLayout')

@section('title', 'registro')

@section('navTitle', 'Registro')

@section('content')

<div class="formulary">
    <h1>seleccione el modo de registro </h1>
       
          
       <a href="{{route('register')}}"><button type="submit"  class="botones">Registrar como BASIC</button></a>
       <a href="{{route('registerGolden')}}"><button type="submit"  class="botones">Registrar como GOLDEN</button></a>
       <br>
       <h2>Definiciones de modos de registro:</h2>
       <h3>- si selecciona registrar como BASIC , tendra todas las funcionalidades de un usuario comun </h3>
       <h3>- si selecciona registrar como GOLDEN, tendra todas las funcionalidades de un usuario comun y Tendra  un descuento de 10% en cada viaje </h3>
       <h4>*para ser usuario Golden debera registrar una tarjeta valida</h4>
    
</div>

@endsection
