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

            <form action="{{route('updateinsumos')}}" method="POST">
                @csrf
                <input type="hidden" name="id_insumo" value="{{$insumo->id_insumos}}">
                <button type="submit">modificar</button>
            </form>
            <button><a href="{{route('deleteinsumos',$insumo->id_insumos)}}">ELIMINAR</a></button>
        </li>
        @endforeach
    </div>
@endsection