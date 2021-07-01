@extends('admin.layout')
@section('title', 'Buscar Viaje')
@section('headerTitle','Buscar Viaje')
@section('content')
    <div class="formulary">
        <h2>Periodo </h2>
        <form action="{{route('reportesViajesEnUnPeriodo')}}" method="POST" class="confirmar">
            @csrf
            <input type="hidden" name="fechaActual" value="{{date('Y-m-d')}}">
            <strong>Desde Fecha:</strong><br>
            <input type="date" name="desdeFecha" value="{{old('desdeFecha')}}"><br>
            <strong>Hasta Fecha:</strong><br>
            <input type="date" name="hastaFecha" value="{{old('hastaFecha')}}"><br>
            <button type="submit">Generar Reporte</button>
        </form>
    </div>
@error('desdeFecha')
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
@error('hastaFecha')
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
