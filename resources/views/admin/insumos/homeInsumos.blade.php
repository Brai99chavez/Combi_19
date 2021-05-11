@extends('admin.layout')
@section('title','Home Insumos')
@extends('admin.layout2')
<p>INSUMOS</p>
@section('content')
    <a href="{{route('createinsumo')}}"><button>CARGAR INSUMO</button></a>
    <ul>
        @foreach($insumos as $insumo)
        <li>
            {{$insumo->nombre}}
            {{$insumo->precio}}
            {{$insumo->descripcion}}
            {{$insumo->disponible}}
            <button><a href="{{route('updateinsumos',$insumo->id_insumos)}}">MODIFICAR</a></button>
            <button><a href="{{route('deleteinsumos',$insumo->id_insumos)}}">ELIMINAR</a></button>
        </li>
        @endforeach
    </ul>
@endsection