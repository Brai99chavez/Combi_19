@extends('user.userLayout')
@section('title', 'Pago de Tarjeta')
@section('headerTitle')
<h1>Pago de Pasajes</h1>
@endsection  
@section('content')
<div class="formulary">
    <h2><strong>{{$cantPasajesCompra}} pasaje/s con descuento a un total de: ${{$precioConDescuento}}</strong></h2>
    <hr>
    <strong><p>Realizar pago con la tarjeta registrada</p></strong>
    <p>Terminado en XXXX-XXXX-XXXX-{{$resultado}}</p>
    <form action="{{route('pagoConTarjetaGuardada')}}" method="GET">
    @csrf
        <input type="hidden" value="{{$cantPasajesCompra}}" name="cantPasajesCompra">
        <input type="hidden" value="{{$id_viaje}}" name="id_viaje">
        <input type="hidden" value="{{$precioindiv}}" name="precio">
        <button type="submit" class="botones">Realizar Pago</button>
    </form>
    <hr>
    <strong><p>Realizar pago con otra tarjeta</p></strong>
    <small>Esta tarjeta no se registrará </small>
    <form action="{{route('pagoConTarjetaNueva')}}" method="POST">
        @csrf
        <input type="hidden" value="{{$cantPasajesCompra}}" name="cantPasajesCompra">
        <input type="hidden" name="id_viaje" value="{{$id_viaje}}">
        <input type="hidden" value="{{$precioConDescuento}}" name="precio">
        <br>
        <strong>
            Numero de Tarjeta 
            <br>
            <input type="text" name="tarjeta" placeholder="16 digitos">
        </strong>
        <br><br>
        <strong>
            Vencimiento
            <br>
            <input type="month" name="fechaVenc">
        </strong>
        <br><br>
        <strong>
            Codigo de seguridad - CVV
            <br>
            <input type="text" name="codigo" placeholder="3 digitos detras de la tarjeta">                      
        </strong>
        <br><br>
        <button type="submit" class="botones">Realizar Pago</button>
        <br>
    </form>
</div>
@error('codigo')
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
@error('fechaVenc')
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
@error('tarjeta')
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
@endsection