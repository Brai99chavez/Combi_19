@extends('admin.layout')

@section('title', 'Viaje Create')

@section('content')
    <h1>VIAJE NUEVO</h1>
    <form action="{{route('createviajeshow')}}" method="POST">
        @csrf
        <label>
            ID_CHOFER:
            <input type="number" name="id_chofer">
        </label>
        <label>
            ID_COMBI
            <input type="number" name="id_combi">
        </label>
        <label>
            FECHA
            <input type="date" name="fecha">
        </label>
        <label>
            HORA
            <input type="time" name="hora">
        </label>
        <label>
            PRECIO
            <input type="number" name="precio">
        </label>
        
        <label>
            ORIGEN
            <select name="origen">
                @foreach($ciudades as $ciudad)
                <option value="{{$ciudad->id_ciudad}}">
                    {{$ciudad->nombre}}
                </option>
                @endforeach
            </select>
        </label>
        <label>
            DESTINO
            <select name="destino">
                @foreach($ciudades as $ciudad)
                <option value="{{$ciudad->id_ciudad}}">
                    {{$ciudad->nombre}}
                </option>  
                @endforeach
            </select>
        </label>
        <button type="submit"> Cargar viaje</button>
    </form>
@endsection