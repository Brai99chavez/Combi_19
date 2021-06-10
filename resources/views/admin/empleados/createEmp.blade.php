@extends('admin.layout')

@section('title', 'registrar Empleado')

@section('headerTitle', 'Regitro Empleado')

@section('content')
    <form action="{{route('saveRegister')}}" method="POST" class="formulary">
        @csrf
        @error('nombre')
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
        <br>
        <strong>Nombre:*</strong><br>
        <input type="text" name="nombre" placeholder="Example:Juan..." value="{{old('nombre')}}"><br>
        <br>
        @error('apellido')
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
        <br>
        <strong>Apellido:*</strong><br>
        <input type="text" name="apellido" placeholder="Example:marquez..." value="{{old('apellido')}}"><br>
        @error('dni')
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
        <br>
        <strong>DNI:*</strong><br>
        <input type="text" name="dni" placeholder="Example:123456789..." value="{{old('dni')}}"><br>
        @error('email')
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
        <br>
        <strong>Email:*</strong><br>
        <input type="email" name="email" placeholder="Example@gmail.com" value="{{old('email')}}"><br>
        <br>
        <strong>Contraseña:*</strong><br>
        <input type="password" name="contraseña" placeholder="***********" value="{{old('contraseña')}}"><br>
        @error('contraseñavalidation')
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
        <br>
        <strong>Repetir Contraseña:*</strong><br>
        <input type="password" name="contraseñavalidation" placeholder="***********" value="{{old('contraseñavalidation')}}"><br>
        <br>
        <strong>Rol:*</strong><br>
        <select name="rol" id="">
            <option value="2" >Chofer</option>
            <option value="3" >Admin</option>
        </select>
        <button class="botones" type="submit">Registrar</button>
    </form>
@endsection