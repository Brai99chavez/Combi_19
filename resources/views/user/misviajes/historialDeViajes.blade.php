@extends('user.userLayout')
@section('title', 'Old Viajes')
@section('headerTitle')
<h1>Historial de Viajes</h1>
@endsection   
@section('content')

    @if($viajes->isNotEmpty())
    <table>
        <thead>
            <tr>
                <th>Origen</th>
                <th>Destino</th>
                <th>Fecha</th>
                <th>Categoria</th>
                <th>Comentarios</th>
            </tr>
        </thead>
        <tbody>
            @foreach($viajes as $viaje)
                <tr>
                    <td>{{$viaje->origen}}</td>
                    <td>{{$viaje->destino}}</td> 
                    <td>{{$viaje->fecha}}</td>
                    <td>{{$viaje->categoria}}</td>   
                    <td>
                        <form action="{{route('viewComentariosViaje')}}" method="GET">
                            <input type="hidden" name="id_viaje" value="{{$viaje->id_viaje}}">
                            <button type="submit" class="botones" ><i class="far fa-plus-square"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>    
    @else
        <h2>Compra tu primer pasaje</h2>
        <a href="{{route('buscarViajesDisponibles')}}"><button class="botones">Comprar</button></a>
    @endif
@error('success')
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
@endsection