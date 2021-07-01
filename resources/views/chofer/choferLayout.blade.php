@extends('layout')
@section('navLinks')
    <li> <a href="{{route('homeChofer')}}">Home</a></li>
    <li> <a href="{{route('misViajesChofer')}}">Viajes Asig</a></li>
    <li> <a href="{{route('updateChofer')}}">Mi perfil</a></li>
    <li> <a href="">Hist de Viajes</a></li>
    <li><a href="">Vender Viajes</a></li>
@endsection