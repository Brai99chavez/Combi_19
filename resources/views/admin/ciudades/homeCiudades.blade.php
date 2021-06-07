@extends('admin.layout')
@section('title', 'Home ciudades')
@section('headerTitle', 'Home ciudades')

@section('content')

    @error('sucess')
    <script>
        Swal.fire({
            icon: 'warning',
            iconColor: '#48C9B0',
            title: '<strong style= "color: white; font-family: arial;"> {{$message}}</strong>',
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
                <th>Direccion</th>
                <th>Disponibilidad</th>
                <th>Opciones  <br> <a href="{{route('createciudad')}}"><button><i class="far fa-plus-square"></i></button></a></th>
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
                        <form action="{{route('updateciudad')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id_ciudad" value="{{$ciudad->id_ciudad}}">
                            <button type="submit"><i class="fas fa-edit"></i></button>
                        </form>
                        <form action="{{route('deleteciudad')}}" method="POST">
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
                    icon: 'warning',
                    iconColor: '#48C9B0',
                    title: '<strong style= "color: white; font-family: arial;"> Aun no hay ciudades cargadas</strong>',
                    background:'#404040',
                    confirmButtonColor: '#45B39D ',
                    confirmButtonText: 'Got it!' ,
                })
            </script>
            @endif
        </tbody>
    </table>

@endsection