@extends('user.userLayout')
@section('title', 'Detalles de Compra')
@section('headerTitle')
<h1>Detalles de Compra</h1>
@endsection  
@section('content')
    <div class="formulary">
        <p><strong>Origen: </strong>{{$viaje[0]->origen}}</p>
        <p><strong>Destino: </strong>{{$viaje[0]->destino}}</p>
        @if(session('id_membresia')==2)
            <p><strong>Precio: </strong>${{$viaje[0]->precio}}</p>
            <p><strong>Con Descuento del {{$golden[0]->descuento}}% : </strong>${{$precioConDescuento}}</p>
        @else
            <p><strong>Precio: </strong>${{$viaje[0]->precio}}</p>
        @endif
        <p><strong>Fecha: </strong>{{$viaje[0]->fecha}}</p>
        <p><strong>Categoria: </strong>{{$viaje[0]->categoria}}</p>
        <p><strong>Hora de salida: </strong>{{$viaje[0]->hora}}hrs</p>
        <p><strong>Pasajes disponibles: </strong>{{$viaje[0]->cantPasajes}}</p>
        <hr>
        <h2>Ingrese la cantidad de pasajes que desea comprar</h2>
        <form action="{{route('crearPago')}}" method="GET">
            @if(session('id_membresia')==2)
                <input type="hidden" value="{{$precioConDescuento}}" name="precioConDescuento">   
            @else
                <input type="hidden" value="{{$viaje[0]->precio}}" name="precio">
            @endif
            <input type="hidden" value="{{$viaje[0]->id_viaje}}" name="id_viaje">
            <input type="hidden" value="{{$viaje[0]->cantPasajes}}" name= "cantPasajes">  
            <p>N° Pasajes</p>
            <input type="number" name="cantPasajesCompra" autocomplete="off">
            <br><br>
            <button type="submit" class="botones">Procesar</button>
        </form>
    </div>
@error('cantPasajesCompra')
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