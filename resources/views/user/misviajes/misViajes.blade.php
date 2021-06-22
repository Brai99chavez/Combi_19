@extends('user.userLayout')
@section('title', 'Mis Pasajes')
@section('headerTitle')
<h1>Mis Pasajes</h1>
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
                    <button type="submit" class="botones" style="width: 150px">Reembolsar Pasaje</button>
                </form>
            </div>   
        @endforeach
    @else
        <div class="formulary">
            <strong><em>Haz tu primer compra</em></strong><br><br>
            <a href="{{route('buscarViajesDisponibles')}}"><button class="botones">Comprar</button></a>
        </div>
    @endif
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
@endsection

@section('js')
<script>
    $('.reembolsar-pasaje').submit (function (e) {

        e.preventDefault();

        Swal.fire({
    title: 'Confirmar Reembolso',
    text: "no podras revertir esto!",
    icon: 'warning',
    iconColor: '#105671',
    showCancelButton: true,
    confirmButtonColor: '#105671',
    confirmButtonText: 'Si, eliminar!',
    cancelButtonText: 'Cancelar'
    }).then((result) => {
    if (result.isConfirmed){
        this.submit();
    }
    })
    });
</script>

@endsection




