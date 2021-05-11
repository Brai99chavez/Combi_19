@extends('admin.layout')
@section('title', 'Home Membresia')
@section('content')
<div class="formulary">
    @foreach($membresias as $membresia)
            {{$membresia->nombre}}
            {{$membresia->descuento}}
            <button onclick=location.href="{{route('updatemembresias',$membresia->id_membresia)}}">MODIFICAR</button>
            <br>
    @endforeach
</div>
@endsection