@extends('admin.layout')
@section('title', 'Home Viajes')
@section('headerTitle', 'Viajes')
@section('content')

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
<table>
    <thead>
        <tr>
            <th>Chofer</th>
            <th>Patente</th>
            <th>Categoria</th>
            <th>Insumos</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Origen</th>
            <th>Destino</th>
            <th>Precio</th>
            <th>Pasajes Disponibles</th>
            <th>Estado</th>
            <th>options <br><a href="{{route('filtrardatosviaje')}}"><button><i class="far fa-plus-square"></i></button></a></th>
        </tr>
    </thead>
    <tbody>           
        @if($viajes->isNotEmpty())
            @foreach($viajes as $viaje)
        <tr>

            <td>{{$viaje->chofer}}</td>
            <td>{{$viaje->patente}}</td>
            <td>{{$viaje->categoria}}</td>
            <td>
                <form action="{{route('insumosviaje_edit')}}" method="GET">
                @csrf
                <input type="hidden" name="id_viaje" value="{{$viaje->id_viaje}}">
                <button type="submit">Editar Insumos</button>
                </form>
            </td>
            <td>{{$viaje->fecha}} </td>
            <td>{{$viaje->hora}}</td>
            <td>{{$viaje->origen}}</td>
            <td>{{$viaje->destino}}</td>
            <td>{{$viaje->precio}}$</td>
            <td>{{$viaje->cantPasajes}}</td>
            <td>{{$viaje->estado}}</td>
            <td class="tableOptions">
                <form action="{{route('updateviajes')}}" method="GET">
                    @csrf
                    <input type="hidden" name="id_viaje" value="{{$viaje->id_viaje}}">
                    <button type="submit"><i class="fas fa-edit"></i></button>
                </form>
                <form action="{{route('deleteviajes')}}" method="POST" class="formulario-eliminar">
                    @csrf
                    <input type="hidden" name="id_viaje" value="{{$viaje->id_viaje}}">
                    <button type="submit"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
        
        @else
        <script>
            Swal.fire({
            title: '<em>No hay viajes</em>',
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
