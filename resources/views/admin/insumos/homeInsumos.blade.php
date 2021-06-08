@extends('admin.layout')
@section('title','Home Insumos')
@section('headerTitle', 'Insumos')
@section('content')
    <h2 style="color: white; text-align:center">ACTIVOS</h2>

    @error('alert')
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
                <th>Precio</th>
                <th>Descripcion</th>
                <th>Opciones<a href="{{route('createinsumo')}}"><button><i class="far fa-plus-square"></i></button></a></th>
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
                    <form action="{{route('deleteinsumos')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id_insumo" value="{{$insumo->id_insumos}}">
                        <button type="submit"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr> 
        </tbody>
        @endforeach
    </table>
    <h2 style="color: white; text-align:center">DADOS DE BAJA</h2>
    
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripcion</th>
                    <th>Opciones<a href="{{route('createinsumo')}}"><button><i class="far fa-plus-square"></i></button></a></th>
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
                        <form action="{{route('deleteinsumos')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id_insumo" value="{{$insumo2->id_insumos}}">
                            <button type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
@endsection