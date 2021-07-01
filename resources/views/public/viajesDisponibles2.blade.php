@extends('public.publicLayout')
@section('title', 'viajesDisponibles')
@section('headerTitle')
<h1>Viajes Disponibles</h1>
@endsection
@section('content')
<div class="formulary">
    <table>
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Precio</th>
                <th>Pasajes disponibles</th>
            </tr>
        </thead>
        <tbody>           
            @if($viajes->isNotEmpty())
                @foreach($viajes as $viaje)
            <tr>
                <td>{{$viaje->categoria}}</td>
                <td>{{$viaje->fecha}} </td>
                <td>{{$viaje->hora}}</td>
                <td>{{$viaje->origen}}</td>
                <td>{{$viaje->destino}}</td>
                <td>{{$viaje->precio}}$</td>
                <td>{{$viaje->cantPasajes}}</td>
                @if($viaje->cantPasajes>0)
                <td>
                    <a href="{{route('register')}}"> <button type="submit">Comprar</button></a>    
                </td>
                @else
                <td>Pasajes agotados</td>   
                @endif
            </tr>
            @endforeach
            @else
            <script>
                Swal.fire({
                title: '<em>Por el momento no hay viajes disponibles</em>',
                icon: 'success',
                iconColor: '#105671',
                confirmButtonColor: '#105671',
                confirmButtonText: 'ok'
            })
            </script>
            @endif
        </tbody>
    </table>
<h3>Registrate y compra tu primer pasaje</h3>
<a href="{{route('/')}}"><button class="botones">Volver</button></a>
</div>
@endsection

