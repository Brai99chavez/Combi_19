@extends('layout')


@section('navLinks')
    <a href="{{route('homeUser')}}">Home</a>
    <a href="{{route('buscarViajesDisponibles')}}">Buscar Viaje</a>
    <a href="{{route('misViajes')}}">Pasajes Comprados</a>
    <a href="{{route('historialDeViajes')}}">Historial de Viajes</a>
    <a href="{{route('editarPerfilCliente')}}">Editar Perfil</a>
@endsection