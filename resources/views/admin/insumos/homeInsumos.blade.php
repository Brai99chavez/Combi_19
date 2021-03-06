@extends('admin.layout')
@section('title','Home Insumos')
@section('headerTitle', 'Insumos')
@section('content')
<div style="display: flex; margin:auto">
    <div>
        <h2 style="color: white; text-align:center">ACTIVOS</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripcion</th>
                    <th>Opciones<a href="{{route('createinsumo')}}"><button><i
                                    class="far fa-plus-square"></i></button></a></th>
                </tr>
            </thead>
            @foreach($insumosDisponibles as $insumo)
            <tbody>
                <tr>
                    <td>{{$insumo->nombre}}</td>
                    <td>{{$insumo->precio}}</td>
                    <td>{{$insumo->descripcion}}</td>
                    <td class="tableOptions">
                        <form action="{{route('updateinsumos')}}" method="get">
                            @csrf
                            <input type="hidden" name="id_insumo" value="{{$insumo->id_insumos}}">
                            <button type="submit"><i class="fas fa-edit"></i></button>
                        </form>
                        <form action="{{route('deleteinsumos')}}" method="POST" class="formulario-eliminar">
                            @csrf
                            <input type="hidden" name="id_insumo" value="{{$insumo->id_insumos}}">
                            <button type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    <div>
        <h2 style="color: white; text-align:center">DADOS DE BAJA</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripcion</th>
                    <th>Opciones<a href="{{route('createinsumo')}}"><button><i
                                    class="far fa-plus-square"></i></button></a>
                    </th>
                </tr>
            </thead>
            @foreach($insumosBaja as $insumo2)
            <tbody>
                <tr>
                    <td>{{$insumo2->nombre}}</td>
                    <td>{{$insumo2->precio}}</td>
                    <td>{{$insumo2->descripcion}}</td>
                    <td class="tableOptions">
                        <form action="{{route('updateinsumos')}}" method="get">
                            @csrf
                            <input type="hidden" name="id_insumo" value="{{$insumo2->id_insumos}}">
                            <button type="submit"><i class="fas fa-edit"></i></button>
                        </form>
                        <form action="{{route('deleteinsumos')}}" method="POST" class="formulario-eliminar">
                            @csrf
                            <input type="hidden" name="id_insumo" value="{{$insumo2->id_insumos}}">
                            <button type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@error('alert')
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
