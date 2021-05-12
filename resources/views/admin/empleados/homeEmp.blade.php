@extends('admin.layout')

@section('title', 'Empleados')

@section('headerTitle', 'Empleados')

@section('content')

    @error('sucess')
        <script>
            Swal.fire({
                icon: 'warning',
                iconColor: '#48C9B0',
                title: '<strong style= "color: white; font-family: arial;">{{$message}}</strong>',
                background:'#404040',
                confirmButtonColor: '#45B39D ',
                confirmButtonText: 'Got it!' ,
            })
        </script>
    @enderror
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Dni</th>
                <th>Rol</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>Opciones<a href="{{route('createEmp')}}"><button><i class="far fa-plus-square"></i></button></a></th>
            </tr>
        </thead>
        <tbody>
            @foreach($Admin as $admin)
            <tr>
                <td>{{$admin->nombre}}</td>
                <td>{{$admin->apellido}}</td>
                <td>{{$admin->dni}}</td>
                <td>Admin</td>
                <td>{{$admin->email}}</td>
                <td>{{$admin->contraseña}}</td>
                <td>
                    <form action="{{route('updateEmp')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id_usuario" value="{{$admin->id_usuario}}">
                        <button type="submit"><i class="fas fa-edit"></i></button>
                    </form>
                    <form action="{{route('deleteEmp')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id_usuario" value="{{$admin->id_usuario}}">
                        <button type="submit"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
            @foreach($Choferes as $chofer)
                <tr>
                    <td>{{$chofer->nombre}}</td>
                    <td>{{$chofer->apellido}}</td>
                    <td>{{$chofer->dni}}</td>
                    <td>Chofer</td>
                    <td>{{$chofer->email}}</td>
                    <td>{{$chofer->contraseña}}</td>
                    <td>
                        <form action="{{route('updateEmp')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id_usuario" value="{{$chofer->id_usuario}}">
                            <button type="submit"><i class="fas fa-edit"></i></button>
                        </form>
                        <form action="{{route('deleteEmp')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id_usuario" value="{{$chofer->id_usuario}}">
                            <button type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection