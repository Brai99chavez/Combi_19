@extends('admin.layout')
@section('title', 'Home Viajes')
@extends('admin.layout2')
<p>VIAJES</p>
@section('content')
    <div>
        <a href="{{route('createviaje')}}"><button>CARGAR VIAJE</button></a>
    <ul>
        @foreach($viajes as $viaje)
            <li>
                {{$viaje->chofer}}
                {{$viaje->patente}}
                {{$viaje->categoria}}
                {{$viaje->origen}}
                {{$viaje->destino}}
                {{$viaje->precio}}
                <button><a href="{{route('updateviajes',$viaje->id_viaje)}}">MODIFICAR</a></button>
                <button><a href="{{route('deleteviajes',$viaje->id_viaje)}}">ELIMINAR</a></button>
            </li>
        @endforeach
    </ul>
    </div>
@endsection