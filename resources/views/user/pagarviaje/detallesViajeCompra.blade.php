@extends('user.userLayout')
@section('title', 'Detalles de Compra')
@section('headerTitle')
<h1>Detalles de Compra</h1>
@endsection  
@section('content')
    <div class="formulary">
        <p>Origen: {{$viaje[0]->origen}}</p>
        <p>Destino: {{$viaje[0]->destino}}</p>
        <p>Precio: ${{$viaje[0]->precio}}</p>
        <p>Fecha: {{$viaje[0]->fecha}}</p>
        <p>Categoria: {{$viaje[0]->categoria}}</p>
        <p>Hora de salida: {{$viaje[0]->hora}}hrs</p>
        <hr>
        <h2>Ingrese la cantidad de pasajes que desea comprar</h2>
        <form action="{{route('crearPago')}}" method="GET">
            <input type="hidden" value="{{$viaje[0]->id_viaje}}" name="id_viaje">  
            <p>N° Pasajes</p>
            <input type="numeric" name="cantPasajesCompra">
            <br><br>
            <button type="submit" class="botones">Procesar</button>
        </form>
    </div>
@error('cantPasajesCompra')
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