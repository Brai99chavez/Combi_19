@extends('user.userLayout')

@section('title', 'viajesDisponibles')

@section('headerTitle')
<h1>Viajes Disponibles</h1>
@endsection
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
            <th>Categoria</th>
            <th>Insumos</th>
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
            <td>
                <form action="{{route('insumosViajeCliente')}}" method="GET">
                    @csrf
                    <input type="hidden" value="{{$viaje->id_viaje}}" name="id_viaje">
                    <button type="submit">Ver insumos</button>
                </form>
            </td>
            <td>{{$viaje->fecha}} </td>
            <td>{{$viaje->hora}}</td>
            <td>{{$viaje->origen}}</td>
            <td>{{$viaje->destino}}</td>
            <td>{{$viaje->precio}}$</td>
            <td>{{$viaje->cantPasajes}}</td>
            @if($viaje->cantPasajes>0)
            <td>
                <form action="{{route('resumenCompraViaje')}}" method="get">
                   @csrf
                   <input type="hidden" name="id_viaje" value="{{$viaje->id_viaje}}">
                   <button type="submit">Comprar</button>
                </form>
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



