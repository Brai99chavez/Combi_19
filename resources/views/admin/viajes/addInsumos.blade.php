@extends('admin.layout')
@section('title', 'Agregar Insumos')
@section('headerTitle', 'Agregar Nuevos Insumos')
@section('content')
    @if($insumosDisponibles->count()>0)
    <form action="{{route('addInsumos.process')}}" method="post" class="formulary">
        @csrf
        <h2>Agregue los nuevos insumos</h2>
        <input type="hidden" name="id_viaje" value="{{$id_viaje}}">
        @foreach($insumosDisponibles as $insumo)
            <ul>
                <li style="list-style-type: none">{{$insumo->nombre}} <input type="checkbox" name="insumo[]"value="{{$insumo->id_insumos}}"></li>
            </ul>
        @endforeach
        <br>
        <button type="submit">Guardar</button>
    </form>
    @else
    <div class="formulary">
        <h2>No hay insumos disponibles para agregar</h2>
        <button onclick="location.href='{{route('homeviajes')}}'">Volver</button>
    </div>
    @endif
@endsection