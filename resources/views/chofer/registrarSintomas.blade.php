@extends('chofer.choferLayout')
@section('title', 'Registrar Sintomas')
@section('headerTitle')
<h1>Registrar Sintomas</h1>
@endsection   
@section('content')
    <div class="formulary">
        <form action="{{route('registrarSintomasProcess')}}" method="POST" class="sintomas-confirmed">
            @csrf
            <input type="hidden" name="id_usuario" value="{{$id_pasajero}}">
            <input type="hidden" name="id_viaje" value="{{$id_viaje}}"> 
            <ul>
                <strong><i><small>En caso de no presentar sintomas selecciona unicamente "Cargar Registro"</small></i></strong><br><br>
                @foreach($sintomas as $sintoma)
                    <li style="list-style-type: none">{{$sintoma->nombre}}<input type="checkbox" name="sintomas[]"value="{{$sintoma->id_sintoma}}"></li>     
                    <br>
                @endforeach
            </ul>
            <button type="submit" class="botones">Cargar Registro</button>
        </form>
    </div>
@error('sintomas[]')
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
        $('.sintomas-confirmed').submit (function (e) {

            e.preventDefault();

            Swal.fire({
        title: '¿Guardar Registro?',
        text: "Confirmar para guardar el registro",
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