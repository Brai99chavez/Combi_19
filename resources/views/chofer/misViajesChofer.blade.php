@extends('chofer.choferLayout')
@section('title', 'Home Chofer')
@section('headerTitle')
<h1>MIS VIAJES</h1>
@endsection
@section('content')
@error('success')
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
@if($viajes->isNotEmpty())

<div class="formulary" style="width: 800px">
@foreach($viajes as $viaje)
    <h2>DETALLES DEL VIAJE</h2>
        <strong>Fecha:</strong>{{$viaje->fecha}}  <br>
        <strong>Hora:</strong> {{$viaje->hora}}<br>
        <strong>Origen:</strong> {{$viaje->origen}} <br>
        <strong>Destino:</strong> {{$viaje->destino}}<br>
        <strong> patente:</strong> {{$viaje->patente}}<br>
        <strong> modelo:</strong> {{$viaje->modelo}}<br>
        <strong> color:</strong> {{$viaje->color}}<br>
        <strong> cantAsientos:</strong> {{$viaje->cant_asientos}}
        <br> <br>
        <strong>ESTADO:</strong> {{$viaje->estado}}
        <strong>PASAJES DISPONIBLES:</strong> {{$viaje->cantPasajes}}
    @if($viaje->fecha == date('Y-m-d'))
        @if($viaje->estado == "Pendiente")

            <form action="{{route('iniciarViaje')}}" method="GET" class="confirmar">
                @csrf
                <input type="hidden" name="id_viaje" value="{{$viaje->id_viaje}}">
                <button type="submit" class="botones" style="width: 150px">Iniciar Viaje</button>
            </form>
            <form action="{{route('cancelarViaje')}}" method="GET" class="confirmar">
                @csrf
                <input type="hidden" name="id_viaje" value="{{$viaje->id_viaje}}">
                <button type="submit" class="botones" style="width: 150px">Cancelar Viaje</button>
            </form>

            @if($viaje->cantPasajes > 0)
            <form action="{{route('venderPasaje')}}" method="GET">
                <input type="hidden" name="precio" value="{{$viaje->precio}}">
                <input type="hidden" name="id_viaje" value="{{$viaje->id_viaje}}">
                <button type="submit" class="botones" style="width: 150px">Vender Pasaje</button>
            </form>
            @else
            <strong><em>Pasajes Agotados</em></strong>
            @endif
        @else
            @if($viaje->estado <> "Cancelado")
                <form action="{{route('finalizarViaje')}}" method="GET" class="confirmar">
                    @csrf
                    <input type="hidden" name="id_viaje" value="{{$viaje->id_viaje}}">
                    <button type="submit" class="botones" style="width: 150px">Finalizar Viaje</button>
                </form>
            @endif

        @endif
    @endif
    <form action="{{route('listarPasajeros')}}" method="GET">
        @csrf
        <input type="hidden" name="id_viaje" value="{{$viaje->id_viaje}}">
        <button type="submit" class="botones" style="width: 150px">Lista de pasajeros</button>
    </form>
    <hr>
@endforeach
</div>
@else
<div class="formulary">
    <h2><em>No tiene ningun viaje asignado</em></h2>
</div>
@endif

@endsection
@section('js')
<script>
    $('.confirmar').submit(function (e) {

        e.preventDefault();

        Swal.fire({
            title: '¿Estas seguro?',
            text: "Confirmar para continuar",
            icon: 'warning',
            iconColor: '#105671',
            showCancelButton: true,
            confirmButtonColor: '#105671',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });

</script>
@endsection
