@extends('admin.layout')
@section('title', 'Edit Insumos')
@section('headerTitle', 'Editar insumos')
@section('content')
<div class="formulary">
    <form action="{{route('insumosviaje.edit.process')}}" method="POST">
        @csrf
        <input type="hidden" name="id_viaje" value="{{$id_viaje}}">
        @if($insumos->count()>0)
            <h5>Seleccione los que desea eliminar</h5>
            @foreach($insumos as $insumo)
                <ul>
                    <li style="list-style-type: none">{{$insumo->nombre}} <input type="checkbox" name="insumo[]"value="{{$insumo->id_insumo}}"></li>
                </ul>
            @endforeach
            <br>
            <button type="submit">Guardar Cambios</button>
        @else
            <nav>Este viaje no tiene insumos asignados</nav>
            <br>
            <button onclick="location.href='{{route('homeviajes')}}'">Volver</button>
        @endif
    </form>
    <form action="{{route('addInsumos')}}" method="post">
        @csrf
        <input type="hidden" value="{{$id_viaje}}" name="id_viaje">
        <button type="submit">Agregar Insumos</button>
    </form>
</div>
@endsection