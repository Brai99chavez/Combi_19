@extends('chofer.choferLayout')
@section('title', 'Vender Pasaje')
@section('headerTitle')
<h1>Vender Pasaje</h1>
@endsection   
@section('content')
    <div class="formulary" >
        <h2>ID de Viaje: {{$id_viaje}} | Precio: ${{$precio}}</h2>
        <form action="{{route('venderPasajeProcess')}}" method="POST" class="confirmar">
            @csrf
            <div style="display: flex ; text-align:center">
                <div>
                    <strong>Nombre: </strong><br><input type="text" name="nombre" value="{{old('nombre')}}"><br>
                    <strong>Apellido: </strong><br> <input type="text" name="apellido" value="{{old('apellido')}}"><br>
                    <strong>DNI: </strong><br> <input type="number" name="dni" value="{{old('dni')}}"><br>
                    <strong>Email: </strong><br> <input type="email" name="email" value="{{old('email')}}"> <br>
                    <strong>Numero de Tarjeta: </strong><br> <input type="number" name="tarjeta" value="{{old('tarjeta')}}"><br>
                </div>
                <div>
                    <strong>Fecha de Vencimiento: </strong><br> <input type="month" name="fechaVenc" value="{{old('fechaVenc')}}"> <br>
                    <strong>Codigo de seguridad - CVC: </strong><br> <input type="number" name="codigo"> <br>
                    <strong>Cantidad de Pasajes:</strong> <br> <input type="number" name="cantPasajes" value="{{old('cantPasajes')}}"><br>
                    <button type="submit">Vender Pasaje</button> <br>
                    <button type="reset" onclick=location.href="{{route('misViajesChofer')}}" class="botones">Volver</button>
                    
                </div>
                <input type="hidden" name="precio" value="{{$precio}}">
                <input type="hidden" name="id_viaje" value="{{$id_viaje}}"><br>
            </div>
        </form>
        
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