@extends('user.userLayout')
@section('title', 'Mis Pasajes')
@section('headerTitle')
<h1>Mis Pasajes</h1>
@endsection   
@section('content')
    @if($viajes->isNotEmpty())
        @foreach($viajes as $viaje)
            <div class="formulary" style="width: 1200px">
                <table>
                    <thead>
                        <tr>
                            <th>N° Pasaje</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$viaje->id_pasaje}}</td>
                            <td>{{$viaje->fecha}} </td> 
                            <td>{{$viaje->hora}}</td>
                            <td>{{$viaje->origen}}</td> 
                            <td>{{$viaje->destino}}</td>
                            <td>{{$viaje->precio}}$</td>
                            @if(session('id_membresia') == 1)
                                <td>
                                    <form action="{{route('reembolsoProcessClienteGolden')}}" method="GET" class="reembolsar-pasaje">
                                    <input type="hidden" name="id_pasaje" value="{{$viaje->id_pasaje}}">
                                    <br>
                                    <button type="submit" class="botones" style="width: 100px">Reembolsar Pasaje</button>
                                    </form>
                                </td>    
                            @else
                                <td>
                                    <form action="{{route('reembolsoTarjetaBasic')}}" method="GET" class="reembolsar-pasaje">
                                    <input type="hidden" name="id_pasaje" value="{{$viaje->id_pasaje}}">
                                    <br>
                                    <button type="submit" class="botones" style="width: 100px">Reembolsar Pasaje</button>
                                    </form>
                                </td>   
                            @endif
                            
                        </tr>
                    </tbody>
                </table>
            </div>   
        @endforeach
    @else
        <div class="formulary">
            <em>¿Aún no haz comprado tu pasaje? Mira nuestros viajes disponibles...</em><br><br>
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
        title: '¿Estas seguro que quiere cancelar el pasaje?',
        text: "¡No podras revertir esto!",
        icon: 'warning',
        iconColor: '#105671',
        showCancelButton: true,
        confirmButtonColor: '#105671',
        confirmButtonText: 'Si, reembolsar',
        cancelButtonText: 'Me arrepenti'
        }).then((result) => {
        if (result.isConfirmed){
            this.submit();
        }
        })
        });
    </script>
@endsection




