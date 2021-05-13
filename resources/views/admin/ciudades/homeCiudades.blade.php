@extends('admin.layout')
@section('title', 'home ciudades')
@section('headerTitle', 'home ciudades')

@section('content')

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Disponibilidad</th>
                {{-- <th>Opciones  <br> <a href="{{route('')}}"><button><i class="far fa-plus-square"></i></button></a></th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($ciudades as $ciudad)
                <tr>
                    <td>{{$ciudad->nombre}}</td>
                    <td>{{$ciudad->direccion}}</td>
                    @if ($ciudad->disponible == 1)
                        <td>disponible</td>
                    @else
                        <td>no disponible</td>
                    @endif
                    {{-- <td>
                        <form action="{{route('')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id_viaje" value="{{$viaje->id_viaje}}">
                            <button type="submit"><i class="fas fa-edit"></i></button>
                        </form>
                        <form action="{{route('')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id_viaje" value="{{$viaje->id_viaje}}">
                            <button type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection