@extends('layout')

@section('navLinks')
<a href="{{route('homeadmin')}}">HOME</a>
<a href="{{route('homeviajes')}}">VIAJES</a>
<a href="{{route('homeinsumos')}}">INSUMOS</a>
<a href="{{route('homemembresias')}}">MEMBRESIAS</a>
<a href="{{route('homecombis')}}">COMBIS</a>
<a href="{{route('homeEmp')}}">EMPLEADOS</a>
@endsection