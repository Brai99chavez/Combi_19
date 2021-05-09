@extends('public.layout')

@section('tittle', 'publicHome')

@section('content')
    <h1>Combi-19</h1>

    <a href="{{route('login')}}">login</a>
    <a href="{{route('register')}}">Registro</a>


    <h3>viajes disponibles</h3>
    <ul>
        @foreach($viajes as $viaje)
            <h3>viaje {{$viaje->id_viaje}}</h3>
            <li>
                <ul>
                    <li>
                        @foreach($choferes as $chofer)
                            @if($chofer->id_usuario == $viaje->id_chofer)
                            <strong>Chofer: </strong>{{$chofer->nombre}} {{$chofer->apellido}}
                            @endif
                        @endforeach
                    </li>
                    <li>

                    </li>
                </ul>
            </li>
        @endforeach
        
    </ul>

@endsection