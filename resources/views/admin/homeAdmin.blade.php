@extends('layout')
@section('title', 'Admin Page')

@section('headerTitle', 'Home Admin')


@section('content')
<div class="formulary">

    <strong>[COMBIS]</strong>
    <ul>
        @foreach($combis as $combi)
        <br>
                {{$combi->patente}}
                {{$combi->modelo}}
                {{$combi->color}}
                {{$combi->cant_asientos}}
                {{$combi->categoria}}
                {{$combi->disponible}}
        <br>
        @endforeach
    </ul>
    <BR></BR>
    <strong>[CHOFERES]</strong>
    <ul>
        @foreach($choferes as $chofer)
        <br>
            {{$chofer->nombre}}
            {{$chofer->apellido}}
            {{$chofer->dni}}
            {{$chofer->email}}
        <br>
        @endforeach
    </ul>
</div>
@endsection