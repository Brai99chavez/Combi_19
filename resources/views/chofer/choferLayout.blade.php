@extends('layout')
@section('navLinks')
    <a href="{{route('homeChofer')}}">Home</a>
    <a href="{{route('misViajesChofer')}}">Viajes Asignados</a>
    <a href="{{route('updateChofer')}}">Mi perfil</a>
    <a href="{{route('historialDeViajesChofer')}}">Historial de Viajes</a>
@endsection