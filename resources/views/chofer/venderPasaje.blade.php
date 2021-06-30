@extends('chofer.choferLayout')
@section('title', 'Vender Pasaje')
@section('headerTitle')
<h1>Vender Pasaje</h1>
@endsection   
@section('content')
    <div class="formulary" style="width: 1000px">
        <h2>ID de Viaje: {{$id_viaje}} | Precio: ${{$precio}}</h2>
        <form action="{{route('venderPasajeProcess')}}" method="POST" class="confirmar">
            @csrf
            <input type="hidden" name="precio" value="{{$precio}}">
            <input type="hidden" name="id_viaje" value="{{$id_viaje}}"><br>
            <strong>Nombre: <input type="text" name="nombre" value="{{old('nombre')}}"></strong><br>
            <strong>Apellido: <input type="text" name="apellido" value="{{old('apellido')}}"></strong><br>
            <strong>DNI: <input type="number" name="dni" value="{{old('dni')}}"></strong><br>
            <strong>Email: <input type="email" name="email" value="{{old('email')}}"></strong><br>
            <strong>Numero de Tarjeta: <input type="number" name="tarjeta" value="{{old('tarjeta')}}"></strong><br>
            <strong>Fecha de Vencimiento: <input type="month" name="fechaVenc" value="{{old('fechaVenc')}}"></strong><br>
            <strong>Codigo de seguridad - CVC: <input type="number" name="codigo"></strong><br>
            <strong>Cantidad de Pasajes: <input type="number" name="cantPasajes" value="{{old('cantPasajes')}}"></strong>
            <button type="submit">Vender Pasaje</button>
        </form>
        <a href="{{route('misViajesChofer')}}"><button class="botones">Volver</button></a>
    </div>
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
@error('dni')
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
@error('cantPasajes')
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