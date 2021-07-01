@extends('admin.layout')
@section('title', 'Home ciudades')
@section('headerTitle', 'Home ciudades')

@section('content')

@error('sucess')
<script>
    Swal.fire({
        title: '{{$message}}',
        icon: 'success',
        iconColor: '#105671',
        confirmButtonColor: '#105671',
        confirmButtonText: 'ok'
    })

</script>
@enderror

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Direccion</th>
            <th> Disponibilidad</th>
            <th>Opciones <br> <a href="{{route('createciudad')}}"><button><i
                            class="far fa-plus-square"></i></button></a></th>
        </tr>
    </thead>
    <tbody>
        @if($ciudades->isNotEmpty())
        @foreach($ciudades as $ciudad)
        <tr>
            <td>{{$ciudad->nombre}}</td>
            <td>{{$ciudad->direccion}}</td>
            @if ($ciudad->disponible == 1)
            <td>disponible</td>
            @else
            <td>no disponible</td>
            @endif
            <td>
                <form action="{{route('updateciudad')}}" method="get">
                    @csrf
                    <input type="hidden" name="id_ciudad" value="{{$ciudad->id_ciudad}}">
                    <button type="submit"><i class="fas fa-edit"></i></button>
                </form>
                <form action="{{route('deleteciudad')}}" method="POST" class="formulario-eliminar">
                    @csrf

                    <input type="hidden" name="id_ciudad" value="{{$ciudad->id_ciudad}}">

                    <button type="submit"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <script>
            Swal.fire({
                title: '<em> Aun no hay ciudades cargadas</em>',
                icon: 'success',
                iconColor: '#105671',
                confirmButtonColor: '#105671',
                confirmButtonText: 'ok'
            })

        </script>
        @endif
    </tbody>
</table>

@endsection

@section('js')
<script>
    $('.formulario-eliminar').submit(function (e) {
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
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });

</script>

@endsection
