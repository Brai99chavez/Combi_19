@extends('user.userLayout')
@section('title', 'Reembolso para usuarios BASIC')
@section('headerTitle')
<h1>Reembolso BASIC</h1>
@endsection        
@section('content')
<div class="formulary">
    <h2><i>N° Pasaje: {{$id_pasaje}}</i></h2>
    <form action="{{route('reembolsoProcessClienteBasic')}}" method="POST" class="confirmar">
        @csrf
        <input type="hidden" name="id_pasaje" value="{{$id_pasaje}}">
        <i><em>Monto a reembolsar: ${{$monto[0]->precio}}</em></i> -
        <i><em>Ingrese la tarjeta donde desea enviar el dinero</em></i>
        <br><br>
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
            Codigo de seguridad - CVC
            <br>
            <input type="number" name="codigo" placeholder="3 digitos">                      
        </strong>
        <br><br>
        <button type="submit" class="botones">Confirmar</button>
        <br>
    </form>
</div>
@error('codigo')
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
@error('fechaVenc')
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
@error('tarjeta')
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
        text: "Confirma para iniciar la transferencia",
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