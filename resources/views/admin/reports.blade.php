@extends('admin.layout')

@section('title', 'reports')

@section('content')
    <div class="reports">
        <h2>Reportes</h2>
        <ul>
            <li><a href="{{route('homeviajes')}}">Viajes</a></li>
            <li><a href="{{route('homeciudades')}}">Ciudades</a></li>
            <li><a href="{{route('homeinsumos')}}">Insumos</a></li>
            <li><a href="{{route('homemembresias')}}">Membresias</a></li>
            <li><a href="{{route('homecombis')}}">Combis</a></li>
            <li><a href="{{route('homeEmp')}}">Empleados</a></li>
        </ul>
    </div>
@endsection