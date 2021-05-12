@extends('admin.layout')

@section('title', 'Loading Insumos')

@section('content')
<div class="formulary">
    SELECCIONE LOS INSUMOS DEL VIAJE
    <label>
        <form action="{{route('createviajeprocess_insumos')}}" method="POST">
            @csrf
            <input type="hidden" name="id_viaje" value="{{$idviaje->id_viaje}}">
            @foreach($insumos as $insumo)               
                <input type="checkbox" name="insumo[]"value="{{$insumo->id_insumos}}">{{$insumo->nombre}}
            @endforeach
            <button type="submit">CARGAR INSUMOS</button>
        </form>
    </label>
</div>  
@endsection