@extends('admin.layout')
@section('title', 'Admin Page')

@section('content')
<h2>HOME DEL ADMINISTRADOR</h2>    
<div>
    <a href="">CARGAR VIAJE |</a>
    <a href="">CARGAR MEMBRESIA |</a>
    <a href="">CARGAR CHOFER |</a>
    <a href="">CARGAR COMBI </a>
    <p>VIAJES</p>
    <ul>
        @foreach($viajes as $viaje)
            <li>
                {{$viaje->chofer}}
                {{$viaje->patente}}
                {{$viaje->categoria}}
                {{$viaje->origen}}
                {{$viaje->destino}}
                {{$viaje->precio}}
            </li>
        @endforeach
    </ul>
    <P>MEMBRESIAS</P>
    <ul>
        @foreach($membresias as $membresia)
            <li>
                {{$membresia->nombre}}
            </li>
        @endforeach
    </ul>
    <p>COMBIS</p>
    <ul>
        @foreach($combis as $combi)
            <li>
                {{$combi->patente}}
                {{$combi->modelo}}
                {{$combi->color}}
                {{$combi->cant_asientos}}
                {{$combi->categoria}}
                {{$combi->disponible}}
            </li>
        @endforeach
    </ul>
    <p>CHOFERES</p>
    <ul>
        @foreach($choferes as $chofer)
        <li>
            {{$chofer->nombre}}
            {{$chofer->apellido}}
            {{$chofer->dni}}
            {{$chofer->email}}
        </li>
        @endforeach
    </ul>
    <p>INSUMOS</p>
    <ul>
        @foreach($insumos as $insumo)
        <li>
            {{$insumo->nombre}}
            {{$insumo->precio}}
            {{$insumo->descripcion}}
            {{$insumo->disponible}}
        </li>
        @endforeach
    </ul>
</div>
@endsection