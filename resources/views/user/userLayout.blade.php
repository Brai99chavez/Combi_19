@extends('layout')


@section('navLinks')
               
    <a href="{{route('viajesDisponibles')}}">Viajes Disponibles</a>
    <a href="{{route('misViajes')}}">Mis Viajes</a>
    <a href="{{route('editarPerfilCliente')}}">Editar Perfil</a>
  
@endsection