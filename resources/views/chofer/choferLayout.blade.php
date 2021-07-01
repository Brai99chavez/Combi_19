@extends('layout')
@section('navLinks')
<li><a href="{{route('homeChofer')}}">Home</a></li>
<li><a href="{{route('misViajesChofer')}}">Viajes Asignados</a></li>
<li><a href="{{route('updateChofer')}}">Mi perfil</a></li>
<li><a href="{{route('historialDeViajesChofer')}}">Historial de Viajes</a></li>

@endsection