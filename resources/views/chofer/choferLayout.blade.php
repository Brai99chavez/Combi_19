@extends('layout')
@section('navLinks')
    <a href="{{route('homeChofer')}}">Home</a>
    <a href="{{route('misViajesChofer')}}">Viajes Asignados</a>
    <a href="{{route('updateChofer')}}">Mi perfil</a>
    <a href="">Historial de Viajes</a>
    <a href="">Vender Viajes</a>
@endsection