@extends('admin.layout')
@section('title', 'Update Insumo')
@section('content')
    <div class="formulary"> 
        <form action="{{route('updateinsumos1')}}" method="POST" class="formulary">
            @csrf
               
                <strong>NOMBRE:</strong>
                <br>
                <input type="text" name="nombre" value="{{$insumo[0]->nombre}}">
                <br>
                @error('nombre')
                    <small>{{$message}}</small>
                @enderror
                <br>
                <strong>PRECIO:</strong>
                <br>
                <input type="number" name="precio" value="{{$insumo[0]->precio}}">
                <br>
                @error('precio')
                <small>{{$message}}</small>
                @enderror
                <br>
                <strong>DESCRIPCION</strong>
                <br>
                <input type="text" name="descripcion" value="{{$insumo[0]->descripcion}}">
                <br>
                <strong>DISPONIBLE</strong>
                <br>
                <select name="disponible" id="" >
                    <option value="0">NO</option>
                    <option value="1">SI</option>
                </select>
                <br>
            <button class="botones" type="submit">ACTUALIZAR INSUMO</button>
        </form>
    </div>
@endsection