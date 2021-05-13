@extends('admin.layout')

@section('title', 'Registro Viaje')

@section('headerTitle', 'Registro Viaje')

@section('content')
    <div class="formulary">
    
    <form action="{{route('createviajeshow')}}" method="POST">
        @csrf
        <label>
            CHOFER
            <select name="id_chofer">
                @foreach($choferes as $chofer)
                <option value="{{$chofer->id_usuario}}">
                    {{$chofer->nombre}}
                </option>
                @endforeach
            </select>
        </label>
        @error('id_chofer')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <br>
        <label>
            COMBIS
            <select name="id_combi">
                @foreach($combis as $combi)
                <option value="{{$combi->id_combi}}">
                    {{$combi->patente}}
                </option>
                @endforeach
            </select>
        </label>
        @error('id_combi')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <br>
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
            <br><br>
            HORA
            <input type="time" name="hora">
        </label>
        @error('hora')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <br>
        <label>
            PRECIO
            <input type="number" name="precio">
        </label>
        @error('precio')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        <br>
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
        <br>
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
        <br>
        <button type="submit"> Cargar viaje</button>
    </form>
    </div>
@endsection