@extends('user.userLayout')
@section('title','Home')
@section('headerTitle')
<h1>Bienvenido</h1>
@endsection
        
@section('content')
  <div class="formulary">
      <i>¿Sabias que actualmente en estas tiempos de pandemia somos la primer empresa que ofrece viajes a nivel nacional? 
        Siempre cumpliendo con todos los protocolos de bioseguridad.</i>
    @if($comentarios->isNotEmpty())
        <i><strong><h2>Comentarios de nuestros clientes</h2></strong></i>
        @foreach($comentarios as $com)
            <hr>
                <em>{{$com->nombre}} {{$com->apellido}} | {{$com->created_at}}</em>
                <br><br>
                {{$com->descripcion}} 
                <br><br>
        @endforeach
    @else
    <br><br>
        <small><em>Sin comentarios registrados por el momento...</em></small>
    @endif
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