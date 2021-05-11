@extends('layout')
@section('title','Home Insumos')
@section('content')
    <a href="{{route('createinsumo')}}"><button>CARGAR INSUMO</button></a>
    <div class="formulary">
        @foreach($insumos as $insumo)
            {{$insumo->nombre}}
            {{$insumo->precio}}
            {{$insumo->descripcion}}
            {{$insumo->disponible}}
            <button onclick=location.href="{{route('updateinsumos',$insumo->id_insumos)}}">MODIFICAR</button>
            <button onclick=location.href="{{route('deleteinsumos')}}">ELIMINAR</button>
        <br><br>
        @endforeach
    </div>
@endsection