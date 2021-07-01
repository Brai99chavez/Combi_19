@extends('layout')


@section('navLinks')

    <li><a href="{{route('homeUser')}}">Home</a></li>
    <li><a href="{{route('buscarViajesDisponibles')}}">Buscar Viaje</a></li>
    <li><a href="{{route('misViajes')}}">Pasajes Comprados</a></li>
    <li><a href="{{route('historialDeViajes')}}">Historial de Viajes</a></li>
    <li><a href="{{route('editarPerfilCliente')}}">Editar Perfil</a></li>
    
@endsection