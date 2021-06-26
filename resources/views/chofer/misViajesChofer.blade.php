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
        @foreach($viajes as $viaje)
            <div class="formulary" style="width: 800px">
            <h2>DETALLES DEL VIAJE</h2>
                <tr>
                    <td><strong>Fecha:</strong>{{$viaje->fecha}} </td> <br>
                    <td><strong>Hora:</strong>  {{$viaje->hora}}</td><br>
                    <td><strong>Origen:</strong>  {{$viaje->origen}}</td> <br>
                    <td><strong>Destino:</strong>  {{$viaje->destino}}</td><br>
                    <h2>DETALLES DE LA COMBI</h2>
                    
                    <td><strong> patente:</strong>  {{$viaje->patente}}</td><br>
                    <td><strong> modelo:</strong>  {{$viaje->modelo}}</td><br>
                    <td><strong> color:</strong>  {{$viaje->color}}</td><br>
                    <td><strong> cantAsientos:</strong>  {{$viaje->cant_asientos}}</td>

                    <br> <br>
                    <td><strong>ESTADO:</strong>  {{$viaje->estado}}</td>
                </tr>
                <hr>
                @if($viaje->fecha == date('Y-m-d'))
                    @if($viaje->estado == "Pendiente")
                        <form action="" method="GET" class="confirmar">
                            @csrf
                            <input type="hidden" name="id_viaje" value="{{$viaje->id_viaje}}">
                            <button type="submit" class="botones" style="width: 150px">Iniciar Viaje</button>
                        </form>
                        <form action="" method="GET" class="confirmar">
                            @csrf
                            <input type="hidden" name="id_viaje" value="{{$viaje->id_viaje}}">
                            <button type="submit" class="botones" style="width: 150px">Cancelar Viaje</button>
                        </form>
                    @else
                        <form action="{{route('finalizarViaje')}}" method="GET" class="confirmar">
                            @csrf
                            <input type="hidden" name="id_viaje" value="{{$viaje->id_viaje}}">
                            <button type="submit" class="botones" style="width: 150px">Finalizar Viaje</button>
                        </form>
                    @endif
                @endif
                <form action="{{route('listarPasajeros')}}" method="GET">
                    @csrf
                    <input type="hidden" name="id_viaje" value="{{$viaje->id_viaje}}">
                    <button type="submit" class="botones" style="width: 150px">Lista de pasajeros</button>
                </form>
            </div>   
        @endforeach
    @else
        <div class="formulary">
            <strong><em>No tiene ningun viaje asignado</em></strong>
        </div>
    @endif

@endsection
@section('js')
    <script>
        $('.confirmar').submit (function (e) {

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
        if (result.isConfirmed){
            this.submit();
        }
        })
        });
    </script>
@endsection