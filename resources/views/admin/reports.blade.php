@extends('admin.layout')

@section('title', 'reports')

@section('content')
    <div class="reports">
        <a href="{{route('homeviajes')}}">Viajes</a>
        <a href="{{route('homeciudades')}}">Ciudades</a>
        <a href="{{route('homeinsumos')}}">Insumos</a>
        <a href="{{route('homemembresias')}}">Membresias</a>
        <a href="{{route('homecombis')}}">Combis</a>
        <a href="{{route('homeEmp')}}">Empleados</a>
    </div>
@endsection