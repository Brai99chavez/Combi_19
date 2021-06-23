@extends('admin.layout')
@section('title','Home Combis')
@section('headerTitle', 'Combis')
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

        @error('combiprocess')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror

    <table>
        <thead>
            <tr>
                <th>patente</th>
                <th>modelo</th>
                <th>color</th>
                <th>asientos</th>
                <th>categoria</th>
                <th>options<a href="{{route('createcombis')}}"><button><i class="far fa-plus-square"></i></button></a></th>
            </tr>
        </thead>
        <tbody>

            @if ($combis->isNotEmpty())
                @foreach($combis as $combi)
                <tr>
                    <td>{{$combi->patente}}</td>
                    <td>{{$combi->modelo}}</td>
                    <td>{{$combi->color}}</td>
                    <td>{{$combi->cant_asientos}}</td>
                    @if($combi->id_categoria == 1)
                        <td>Comoda</td>
                    @else
                        <td>Super Comoda</td>
                    @endif
                    <td>
                        <form action="{{route('updatecombi')}}" method="get">
                            @csrf
                            <input type="hidden" name="id_combi" value="{{$combi->id_combi}}">
                            <button type="submit"><i class="fas fa-edit"></i></button>
                        </form>
                        <form action="{{route('deleteCombi')}}" method="POST" class="formulario-eliminar">
                            @csrf
                            <input type="hidden" name="id_combi" value="{{$combi->id_combi}}">
                            <button type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @else
            <script>
                Swal.fire({
                title: '<em>No hay combis cargadas</em>',
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