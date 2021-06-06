@extends('admin.layout')

@section('title', 'Loading Insumos')

@section('content')
<div class="formulary">
    <h2>Seleccione los insumos del viaje</h2>
    <label>
        <form action="{{route('createviajeprocess_insumos')}}" method="POST" class="formulary">
            @csrf
            <input type="hidden" name="id_viaje" value="{{$idviaje[0]->id_viaje}}">
            @foreach($insumos as $insumo)               
                <input type="checkbox" name="insumo[]"value="{{$insumo->id_insumos}}">{{$insumo->nombre}}
                <br>
            @endforeach
            <button type="submit">Cargar Insumos</button>
        </form>
    </label>
</div>  
@endsection