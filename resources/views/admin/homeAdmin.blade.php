@extends('admin.layout')
@section('title', 'Admin Page')
@section('content')
<h2>HOME DEL ADMINISTRADOR</h2>    
<div>
    <a href="{{route('homeviajes')}}">VIAJES</a>
    <a href="{{route('homeinsumos')}}">INSUMOS |</a>
    <a href="{{route('homemembresias')}}">MEMBRESIAS |</a>
    <a href="{{route('homecombis')}}">COMBIS |</a>
    <a href="{{route('homechoferes')}}">CHOFERES |</a>
    
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
</div>
@endsection