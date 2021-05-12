@extends('public.publicLayout')

@section('title','publicHome')

@section('navTitle','Public Home')

@section('content')

<div class="formulary">
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
</div>

@endsection
