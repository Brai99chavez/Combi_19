@extends('admin.layout')
@section('title', 'Home Viajes')
@section('headerTitle', 'Viajes')
@section('content')
<div>
    
    <table>
        <thead>
            <tr>
                <th>chofer</th>
                <th>patente</th>
                <th>categoria</th>
                <th>insumos</th>
                <th>fecha</th>
                <th>hora</th>
                <th>origen</th>
                <th>destino</th>
                <th>precio</th>
                <th>options <br> <a href="{{route('createviaje')}}"><button><i class="far fa-plus-square"></i></button></a></th>
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
                    @foreach($viaje_insumos as $v_i)
                        @if($viaje->id_viaje == $v_i->id_viaje)
                        {{$v_i->nombre}},
                        @endif
                    @endforeach
                </td>
                <td>{{$viaje->fecha}} </td>
                <td>{{$viaje->hora}}</td>
                <td>{{$viaje->origen}}</td>
                <td>{{$viaje->destino}}</td>
                <td>{{$viaje->precio}}$</td>


                <td class="tableOptions">
                    <form action="{{route('updateviajes')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id_viaje" value="{{$viaje->id_viaje}}">
                        <button type="submit"><i class="fas fa-edit"></i></button>
                    </form>
                    <form action="{{route('deleteviajes')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id_viaje" value="{{$viaje->id_viaje}}">
                        <button type="submit"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
                <br>
            </tr>
            @endforeach
            
            @else
            <script>
                Swal.fire({
                    icon: 'warning',
                    iconColor: '#48C9B0',
                    title: '<strong style= "color: white; font-family: arial;"> No hay viajes</strong>',
                    background:'#404040',
                    confirmButtonColor: '#45B39D ',
                    confirmButtonText: 'Got it!' ,
                })
            </script>

            @endif
        </tbody>
    </table>
</div>
@endsection
