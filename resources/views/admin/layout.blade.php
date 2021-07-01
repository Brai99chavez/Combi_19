@extends('layout')

@section('navLinks')
<li><a href="{{route('homeadmin')}}">Home</a></li>
<li><a href="{{route('reports')}}">Reports</a></li>
<li><a href="{{route('homeviajes')}}">Viajes</a></li>
<li><a href="{{route('homeciudades')}}">Ciudades</a></li>
<li><a href="{{route('homeinsumos')}}">Insumos</a></li>
<li><a href="{{route('homemembresias')}}">Membresias</a></li>
<li><a href="{{route('homecombis')}}">Combis</a></li>
<li><a href="{{route('homeEmp')}}">Empleados</a></li>
@endsection