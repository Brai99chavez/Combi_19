@extends('user.userLayout')
@section('title', 'Mis Pasajes')
@section('headerTitle')
<h1>Mis Pasajes</h1>
@endsection
@section('content')
@if($viajes->isNotEmpty())
<div class="formulary">
@foreach($viajes as $viaje)
    <strong>N° Pasaje: </strong>{{$viaje->id_pasaje}}<br>
    <strong>Fecha: </strong>{{$viaje->fecha}}<br>
    <strong>Hora: </strong>{{$viaje->hora}}<br>
    <strong>Origen: </strong>{{$viaje->origen}}<br>
    <strong>Destino: </strong>{{$viaje->destino}}<br>
    <strong>Precio: </strong>{{$viaje->precio}}$<br>
    @if($viaje->estado <> "Ausente")
        @if(session('id_membresia') == 1)
            <form action="{{route('reembolsoProcessClienteGolden')}}" method="GET" class="reembolsar-pasaje">
                <input type="hidden" name="id_pasaje" value="{{$viaje->id_pasaje}}">
                <br>
                @if($viaje->reembolsar == "SI" || $viaje->estado == "Pendiente")
                <button type="submit" class="botones" style="width: 100px">Reembolsar Pasaje</button>
                @endif
            </form>
        @else
            <form action="{{route('reembolsoTarjetaBasic')}}" method="GET" class="reembolsar-pasaje">
                <input type="hidden" name="id_pasaje" value="{{$viaje->id_pasaje}}">
                <br>
                @if($viaje->reembolsar == "SI" || $viaje->estado == "Pendiente")
                <button type="submit" class="botones" style="width: 100px">Reembolsar Pasaje</button>
                @endif
            </form>
        @endif
        @else
        <strong><em>Reembolso no disponible</em></strong>
        @endif
        <p>-----------------------------------</p>
    @endforeach
</div>
@else
<div class="formulary">
    <em>¿Aún no haz comprado tu pasaje? Mira nuestros viajes disponibles...</em><br><br>
    <a href="{{route('buscarViajesDisponibles')}}"><button class="botones">Comprar</button></a>
</div>
@endif
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
@section('js')
<script>
    $('.reembolsar-pasaje').submit(function (e) {

        e.preventDefault();

        Swal.fire({
            title: '¿Estas seguro que quiere cancelar el pasaje?',
            text: "¡No podras revertir esto!",
            icon: 'warning',
            iconColor: '#105671',
            showCancelButton: true,
            confirmButtonColor: '#105671',
            confirmButtonText: 'Si, reembolsar',
            cancelButtonText: 'Me arrepenti'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });

</script>
@endsection
