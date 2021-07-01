@extends('admin.layout')
@section('title', 'Buscar Viaje')
@section('headerTitle','Buscar Viaje')
@section('content')
    <div class="formulary">
        <form action="{{route('reportesViajesEnUnPeriodo')}}" method="POST" class="confirmar">
            @csrf
            <input type="hidden" name="fechaActual" value="{{date('Y-m-d')}}">
            <em>Desde Fecha: <input type="date" name="desdeFecha" value="{{old('desdeFecha')}}"></em>
            <em>Hasta Fecha: <input type="date" name="hastaFecha" value="{{old('hastaFecha')}}"></em>
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
