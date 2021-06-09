@extends('user.userLayout')

@section('title', 'viajesDisponibles')

@section('navTitle')
{{session('nombre')}} {{session('apellido')}}
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
            <th>chofer</th>
            <th>categoria</th>
            <th>insumos</th>
            <th>fecha</th>
            <th>hora</th>
            <th>origen</th>
            <th>destino</th>
            <th>precio</th>
            <th>AsientDisponibles</th>
        </tr>
    </thead>
    <tbody>           
        @if($viajes->isNotEmpty())
            @foreach($viajes as $viaje)
        <tr>
 
            <td>{{$viaje->chofer}}</td>
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
            <td>{{$viaje->cant_asientos}}</td>
            
            <td>
                 <form action="{{route('crearPago')}}" method="get">
                    @csrf
                    <input type="hidden" name="id_viaje" value="{{$viaje->id_viaje}}">
                    <input type="hidden" name="id_usuario" value="{{session('id_usuario')}}">
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
                title: '<strong style= "color: white; font-family: arial;"> No hay viajes</strong>',
                background:'#404040',
                confirmButtonColor: '#45B39D ',
                confirmButtonText: 'Got it!' ,
            })
        </script>
        @endif
    </tbody>
</table>
     

 
@error('permiso')
    <small>{{$message}}</small>
@enderror
@endsection



