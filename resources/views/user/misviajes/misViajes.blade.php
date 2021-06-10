@extends('user.userLayout')
@section('title', 'Mis Viajes')
@section('headerTitle')
<h1>Mis Viajes</h1>
@endsection   
@section('content')
    @if($viajes->isNotEmpty())
        @foreach($viajes as $viaje)
            <div class="formulary" style="width: 1000px">
                <tr>
                    <td>N° Pasaje: {{$viaje->id_pasaje}}</td>
                    <td>Fecha: {{$viaje->fecha}} </td> 
                    <td>Hora: {{$viaje->hora}}</td>
                    <td>Origen: {{$viaje->origen}}</td> 
                    <td>Destino: {{$viaje->destino}}</td>
                    <td>Precio: {{$viaje->precio}}$</td>
                </tr>
                <form action="{{route('reembolsoProcessCliente')}}" method="GET">
                    <input type="hidden" name="id_pasaje" value="{{$viaje->id_pasaje}}">
                    <br>
                    <button type="submit" class="botones" style="width: 150px">Solicitar Reembolso</button>
                </form>
            </div>   
        @endforeach
    @else
        <div class="formulary">
            <strong><em>Haz tu primer compra</em></strong><br><br>
            <a href="{{route('buscarViajesDisponibles')}}"><button class="botones">Comprar</button></a>
        </div>
    @endif
@error('success')
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
@endsection



