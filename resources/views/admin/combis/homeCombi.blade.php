@extends('admin.layout')
@section('title','Home Combis')
@section('headerTitle', 'Combis')
@section('content')
    <table>
        <thead>
            <tr>
                <th>patente</th>
                <th>modelo</th>
                <th>color</th>
                <th>asientos</th>
                <th>categoria</th>
                <td>disponible</td>
                {{-- <td>options<a href="{{route('')}}"><button><i class="far fa-plus-square"></i></button></a></td> --}}
            </tr>
        </thead>
        <tbody>

            @if ($combis->isNotEmpty())
                @foreach($combis as $combi)
                <tr>
                    <td>{{$combi->}}</td>
                    <td>{{$combi->}}</td>
                    <td>{{$combi->}}</td>
                    <td>{{$combi->}}</td>
                    <td>{{$combi->}}</td>
                    <td>{{$combi->}}</td>
                    {{-- <td>
                        <form action="{{route('')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id_combi" value="{{$combi->id_combi}}">
                            <button type="submit"><i class="fas fa-edit"></i></button>
                        </form>
                        <form action="{{route('')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id_combi" value="{{$combi->id_combi}}">
                            <button type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td> --}}
                </tr>
                @endforeach
            @else
            <script>
                Swal.fire({
                    icon: 'warning',
                    iconColor: '#48C9B0',
                    title: '<strong style= "color: white; font-family: arial;"> No hay Combis Cargadas</strong>',
                    background:'#404040',
                    confirmButtonColor: '#45B39D ',
                    confirmButtonText: 'Got it!' ,
                })
            </script>
            @endif
        </tbody>
    </table>
@endsection