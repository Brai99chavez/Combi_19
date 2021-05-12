@extends('admin.layout')
@section('title', 'Home Membresia')
@section('headerTitle', 'Membresias')
@section('content')
<div class="formulary">
    @foreach($membresias as $membresia)
            {{$membresia->nombre}}
            {{$membresia->descuento}}
            <form action="{{route('updatemembresias')}}" method="POST">
                @csrf
                <input type="hidden" name="id_membresia"value="{{$membresia->id_membresia}}">
                <button type="submit">MODIFICAR</button>
            </form>
            <br>
    @endforeach
    @error('updateprocess')
    <br>
        <small>{{$message}}</small>
    <br>
@enderror
</div>
@endsection
