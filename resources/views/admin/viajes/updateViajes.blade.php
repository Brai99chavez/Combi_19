
@extends('admin.layout')

@section('title', 'Actualizar viaje')

@section('content')
<div class="formulary">
    <h1>Actualizar Viaje</h1>
    <form action="{{route('updateviajesprocess')}}" method="POST">
        @csrf 
        <br>
        <input type="hidden" name="id_viaje" value="{{$viaje[0]->id_viaje}}">
        <label>
            ID_CHOFER:
            <input type="number" name="id_chofer" value="{{$viaje[0]->id_chofer}}"> 
        </label> <br> 
        <label>
            ID_COMBI
            <input type="text" name="id_combi" value="{{$viaje[0]->id_combi}} ">
        </label> <br> 
            FECHA
            <input type="text" name="fecha" value=" {{$viaje[0]->fecha}} ">
        </label> <br>
        <label> 
            HORA
            <input type="text" name="hora" value=" {{$viaje[0]->hora}} ">
        </label> <br>
        <label>
            PRECIO
            <input type="text"  name="precio" value=" {{$viaje[0]->precio}} ">
        </label> <br>
        <label>
            ORIGEN
            <select name="origen">
                @foreach($ciudades as $ciudad)
                <option value="{{$viaje[0]->origen}}">
                    {{$ciudad->nombre}}
                </option>
                @endforeach
            </select>
        </label>
        <br>
        <label>
            DESTINO
            <select name="destino">
                @foreach($ciudades as $ciudad)
                <option  value="{{$viaje[0]->destino}}">
                    {{$ciudad->nombre}}
                </option>  
                @endforeach
            </select>
        </label><br>
        <br>
        <h5>Presiona actualizar para ver los insumos</h5>
        <button type="submit"> Actualizar viaje</button>
    </form>
</div>
@endsection