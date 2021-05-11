@extends('admin.layout')
@section('title', 'Show Insumo')
@section('content')
    <a href="{{route('homeadmin')}}"><button>VOLVER AL HOME</button></a>
    <h2>INSUMO NUEVO</h2>
        <label>
            NOMBRE:
            {{$insumo->nombre}}
        </label>
        <label>
            PRECIO:
            {{$insumo->precio}}
        </label>
        <label>
            DESCRIPCION:
            {{$insumo->descripcion}}
        </label>
        <label>
            DISPONIBLE:
            {{$dis}}
        </label>
@endsection