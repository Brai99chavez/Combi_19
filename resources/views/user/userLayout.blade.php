@extends('layout')


@section('navLinks')
    <a href="{{route('buscarViajesDisponibles')}}">Buscar Viaje</a>
    <a href="{{route('misViajes')}}">Mis Viajes</a>
    <a href="{{route('editarPerfilCliente')}}">Editar Perfil</a>
@endsection