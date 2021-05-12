@extends('admin.layout')
@section('title', 'Update Membresia')
@section('headerTitle', 'Modificar Membresia')
@section('content')
    <div class="formulary">
        <form action="{{route('updatemembresiasprocess')}}" method="POST">
            @csrf
            <input type="hidden" name="id_membresia" value="{{$membresia[0]->id_membresia}}">
            <input type="text" name="nombre" value="{{$membresia[0]->nombre}}">
            <input type="text" name="descuento" value="{{$membresia[0]->descuento}}">
            <button type="submit" class="botones">ENVIAR</button>
        </form>
    </div>
@endsection
@error('updateprocess')
    <br>
        <small>{{$message}}</small>    
    <br>
@enderror