@extends('admin.layout')
@section('title', 'Edit Insumos')
@section('headerTitle', 'Editar insumos')
@section('content')
<label>
    <form action="{{route('insumosviaje.edit.process')}}" method="POST" class="formulary">
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
         <!--AGREGAR BOTON PARA AGREGAR NUEVOS INSUMOS-->
    </form>
</label>
@endsection