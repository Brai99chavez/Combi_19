@extends('layout')
@section('title','Home Insumos')
@section('content')
    <a href="{{route('createinsumo')}}"><button>CARGAR INSUMO</button></a>
    <div class="formulary">
        <h2>INSUMOS DISPONIBLES</h2>
        @foreach($insumosDisponibles as $insumo)
            {{$insumo->nombre}}
            {{$insumo->precio}}
            {{$insumo->descripcion}}
            {{$insumo->disponible}}
            <form action="{{route('updateinsumos')}}" method="POST">
                @csrf
                <input type="hidden" name="id_insumo" value="{{$insumo->id_insumos}}">
                <button type="submit">MODIFICAR</button>
            </form>
            <form action="{{route('deleteinsumos')}}" method="POST">
                @csrf
                <input type="hidden" name="id_insumo" value="{{$insumo->id_insumos}}">
                <button type="submit">ELIMINAR</button>
            </form>
        </li>
        @endforeach
        <h2>INSUMOS DADOS DE BAJA</h2>
        @foreach($insumosBaja as $insumo2)
            {{$insumo2->nombre}}
            {{$insumo2->precio}}
            {{$insumo2->descripcion}}
            <form action="{{route('updateinsumos')}}" method="POST">
                @csrf
                <input type="hidden" name="id_insumo" value="{{$insumo2->id_insumos}}">
                <button type="submit">MODIFICAR</button>
            </form>
            <form action="{{route('deleteinsumos')}}" method="POST">
                @csrf
                <input type="hidden" name="id_insumo" value="{{$insumo2->id_insumos}}">
                <button type="submit">ELIMINAR</button>
            </form>
        @endforeach
    </div>
@endsection