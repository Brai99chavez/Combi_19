@extends('admin.layout')
@section('title', 'Viaje Show')
@section('content')
    <p>DETALLES DEL NUEVO VIAJE CREADO</p>
    <a href="{{route('homeadmin')}}">VOLVER</a>
    <br>
    <label>
        ID_CHOFER:
        {{$viaje->id_chofer}}
    </label>
    <br>
    <label>
        ID_COMBI:
        {{$viaje->id_combi}}
    </label>
    <br>
    <label>
        FECHA:
        {{$viaje->fecha}}
    </label>
    <br>
    <label>
        ID_PRECIO:
        {{$viaje->precio}}
    </label>
    <br>
    <label>
        ORIGEN:
        {{$origen->nombre}}
    </label>
    <br>
    <label>
        DESTINO:
        {{$destino->nombre}}
    </label>
@endsection