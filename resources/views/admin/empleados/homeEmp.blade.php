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
                <th>Opciones<a href="{{route('createEmp')}}"><button><i class="far fa-plus-square"></i></button></a></th>
            </tr>
        </thead>
        <tbody>
            @if($Admin->isNotEmpty() && $Choferes->isNotEmpty())
                @foreach($Admin as $admin)
                <tr>
                    <td>{{$admin->nombre}}</td>
                    <td>{{$admin->apellido}}</td>
                    <td>{{$admin->dni}}</td>
                    <td>Admin</td>
                    <td>{{$admin->email}}</td>
                    <td>
                        <form action="{{route('updateEmp')}}" method="get">
                            @csrf
                            <input type="hidden" name="id_usuario" value="{{$admin->id_usuario}}">
                            <button type="submit"><i class="fas fa-edit"></i></button>
                        </form>
                        <form action="{{route('deleteEmp')}}" method="POST" class="formulario-eliminar">
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
                        <td>
                            <form action="{{route('updateEmp')}}" method="get">
                                @csrf
                                <input type="hidden" name="id_usuario" value="{{$chofer->id_usuario}}">
                                <button type="submit"><i class="fas fa-edit"></i></button>
                            </form>
                            <form action="{{route('deleteEmp')}}" method="POST" class="formulario-eliminar">
                                @csrf
                                <input type="hidden" name="id_usuario" value="{{$chofer->id_usuario}}" >
                                <button type="submit"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
            <script>
                Swal.fire({
                    icon: 'warning',
                    iconColor: '#48C9B0',
                    title: '<strong style= "color: white; font-family: arial;"> No hay empleados</strong>',
                    background:'#404040',
                    confirmButtonColor: '#45B39D ',
                    confirmButtonText: 'Got it!' ,
                })
            </script>
            @endif        
        </tbody>
    </table>

    @section('js')
        <script>
            $('.formulario-eliminar').submit (function (e) {
                e.preventDefault();
                Swal.fire({
            title: 'Confirmar eliminacion',
            text: "no podras revertir esto!",
            icon: 'warning',
            iconColor: '#105671',
            showCancelButton: true,
            confirmButtonColor: '#105671',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed){
                this.submit();
            }
            })
            });
        </script>

    @endsection

@endsection
