
@extends('admin.layout')

@section('title', 'Actualizar viaje')

@section('content')
<div class="formulary">
    <h1>Actualizar Viaje</h1>
    <form action="{{route('updateviajes1')}}" method="POST" >
        @csrf 
        <input type="hidden" name="id_viaje" value="{{$viaje[0]->id_viaje}}">
        <br>
        <label>
            CHOFER:
            <select name="id_usuario" id="" value="{{$viaje[0]->id_usuario}}">
                @foreach($Choferes as $chofer)
                    <option value="{{$chofer->id_usuario}}">{{$chofer->nombre}}</option>
                @endforeach
            </select>
        </label> <br> 
        <label>
            COMBI
            <select name="id_combi" id="" value="{{$viaje[0]->id_combi}}">
                @foreach($Combis as $combi)
                    <option value="{{$combi->id_combi}}">Patente:{{$combi->patente}}</option>
                @endforeach
            </select>
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

        <button type="submit"> Actualizar viaje</button>
    </form>
</div>
@endsection