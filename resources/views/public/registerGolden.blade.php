@extends('public.publicLayout')

@section('title', 'registro Golden')

@section('navTitle', 'Registro Golden')

@section('content')

<div class="formulary">
    <h2>Registro Golden</h2>

    <form action="{{route('guardarRegistroGolden')}}" method="post" style="display: flex">
        @csrf
        <div>
            <strong>
                Nombre:*
                <br>
                <input type="text" name="nombre" value="{{old('nombre')}}" placeholder="carlos.....">
            </strong>
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
            <br>
            <strong>
                Apellido:*
                <br>
                <input type="text" name="apellido" value="{{old('apellido')}}" placeholder="rodriguez....">
            </strong>
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
            <br>
            <strong>
                dni:*
                <br>
                <input type="number" name="dni" value="{{old('dni')}}" placeholder="987654321....">
            </strong>
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
            <br>
            <strong>     
                Email:*
                <br>
                <input type="email" name="email" value="{{old('email')}}" placeholder="example@gmail.com.....">
            </strong>
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
            <br>
            <strong>
                Contraseña:*
                <br>
                <input type="password" name="contraseña" value="{{old('contraseña')}}" placeholder="password......">
            </strong>
            @error('contraseña')
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
            <br>
        </div>
        <div>
            <strong>
                Numero de Tarjeta 
                <br>
                <input type="text" name="tarjeta" value="{{old('tarjeta')}}" placeholder="XXXX-XXXX-XXXX">
            </strong>
            <br>
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
            <br>
            <strong>
                Fecha de Vencimiento
                <br>
                <input type="month" name="fechaVenc" value="{{old('fechaVenc')}}" placeholder="01/07..">
            </strong>
            <br>
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
            <br>
            <strong>
                Codigo de seguridad - CVC
                <br>
                <input type="text" name="codigo" value="{{old('codigo')}}" placeholder="XXX..">
            </strong>
            <br>
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
            <br>
            <button type="submit" class="botones">  Registrarse  </button><br>
            <button type="reset" onclick=location.href="{{route('register')}}" class="botones">  Volver  </button>
        </div>
    </form>
</div>
@endsection
