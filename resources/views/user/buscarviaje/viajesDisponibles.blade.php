@extends('user.userLayout')

@section('title', 'viajesDisponibles')

@section('headerTitle')
<h1>Viajes Disponibles</h1>
@endsection
@section('content')
@error('sucess')
<script>
    Swal.fire({
        icon: 'warning',
        iconColor: '#48C9B0',
        title: '<strong style= "color: white; font-family: arial;"> {{$message}} </strong>',
        background:'#404040',
        confirmButtonColor: '#45B39D ',
        confirmButtonText: 'Got it!' ,
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
            <td>{{$viaje->cant_asientos}}</td>
            <td>
                 <form action="{{route('crearPago')}}" method="get">
                    @csrf
                    <input type="hidden" name="id_viaje" value="{{$viaje->id_viaje}}">
                    <button type="submit">COMPRAR</button>
                 </form>
            </td>
        </tr>
        @endforeach
        @else
        <script>
            Swal.fire({
                icon: 'warning',
                iconColor: '#48C9B0',
                title: '<strong style= "color: white; font-family: arial;">Por el momento no hay viajes disponibles</strong>',
                background:'#404040',
                confirmButtonColor: '#45B39D ',
                confirmButtonText: 'Got it!' ,
            })
        </script>
        @endif
    </tbody>
</table>
@error('success')
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
@endsection


