@extends('admin.layout')
@section('title', 'Home Viajes')
@section('content')
    <div>
        <p>VIAJES</p>
        <a href="{{route('createviaje')}}">CARGAR VIAJE |</a>
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