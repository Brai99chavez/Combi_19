@extends('chofer.choferLayout')
@section('title', 'Home Chofer')
@section('headerTitle')
<h1>Editar Perfil</h1>
@endsection   
@section('content')

<div class="formulary"> 
<form action="{{route('updateChoferProcess')}}" method="POST" class="confirmar">
<h2>Actualizar Datos</h2>
<br>
    @csrf
    <strong>
        Nombre
        <br>
        <input type="text" name="nombre" value="{{$usuario[0]->nombre}}" autocomplete="off"> 
    </strong>
    <br>
    <strong>
        Apellido
        <br>
        <input type="text" name="apellido" value="{{$usuario[0]->apellido}}" autocomplete="off">
    </strong>
    <br>
    <strong>
        DNI
        <br>
        <input type="number" name="dni" value="{{$usuario[0]->dni}}" disabled>
    </strong>
    <br>
    <strong>
        Email
        <br>
        <input type="email" name="email" value="{{$usuario[0]->email}}" autocomplete="off">
    </strong>
    <br>
    <i><small>En caso de haber olvidado su contraseña contáctese con personal administrativo</small></i>
    <br><br>
    <button type="submit" class="botones">Confirmar</button>
</form>
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
@error('error')
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
@error('email')
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
@error('apellido')
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
@error('nombre')
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
        title: '¿Guardar Cambios?',
        text: "Confirmar para actualizar",
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