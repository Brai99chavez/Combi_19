@extends('user.userLayout')
@section('title', 'Old Viajes')
@section('headerTitle')
<h1>Historial de Viajes</h1>
@endsection   
@section('content')
<div class="formulary" style="width: 1000px">
    @if($viajes->isNotEmpty())
    <table>
        <thead>
            <tr>
                <th>Origen</th>
                <th>Destino</th>
                <th>Fecha</th>
                <th>Categoria</th>
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
                            <button type="submit" class="botones" style="width: 100px">Agregar Comentario</button>
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
</div>
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