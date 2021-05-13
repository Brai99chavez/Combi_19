@extends('admin.layout')

@section('title', 'Registro Viaje')

@section('headerTitle', 'Registro Viaje')

@section('content')
    <div class="formulary">
    
    <form action="{{route('createviajeshow')}}" method="POST">
        @csrf
        <label>
            ID_CHOFER:
            <input type="number" name="id_chofer">
        </label>
        @error('id_chofer')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <label>
            ID_COMBI
            <input type="number" name="id_combi">
        </label>
        @error('id_combi')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <label>
            FECHA
            <input type="date" name="fecha">
        </label>
        @error('fecha')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <label>
            HORA
            <input type="time" name="hora">
        </label>
        @error('hora')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <label>
            PRECIO
            <input type="number" name="precio">
        </label>
        @error('precio')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
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
        @error('origen')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
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
        @error('destino')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <button type="submit"> Cargar viaje</button>
    </form>
    </div>
@endsection