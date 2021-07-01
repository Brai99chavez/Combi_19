@extends('admin.layout')

@section('title', 'Modificar Empleado')

@section('headerTitle', 'Modificar Empleado')

@section('content')
<div class="formulary">
    <h2>Modifiar Empleado</h2>
    <form action="{{route('saveEmp')}}" method="POST" >
        @csrf
        <input type="hidden" name="id_usuario" value="{{$usuario[0]->id_usuario}}">
        <strong>Nombre:*</strong><br>
        <input type="text" name="nombre" placeholder="Example:Juan..." value="{{$usuario[0]->nombre}}"><br>
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
        <strong>Apellido:*</strong><br>
        <input type="text" name="apellido" placeholder="Example:marquez..." value="{{$usuario[0]->apellido}}"><br>
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
        <strong>DNI:*</strong><br>
        <input type="number" name="dni" placeholder="Example:123456789..." value="{{$usuario[0]->dni}}"><br>
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
        <strong>Email:*</strong><br>
        <input type="email" name="email" placeholder="Example@gmail.com" value="{{$usuario[0]->email}}"><br>
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
        <strong>Contraseña:*</strong><br>
        <input type="password" name="contraseña" placeholder="***********" value="{{$usuario[0]->contraseña}}"><br>
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
        <strong>Rol:*</strong><br>
        <select name="rol" id="">
            <option value="2" >Chofer</option>
            <option value="3" >Admin</option>
        </select><br>
        <button class="botones" type="submit">Modificar</button>
    </form>
</div>
@endsection