@extends('user.userLayout')

@section('title', 'home')

@section('head')
@endsection
        
@section('content')
<h1>Bienvenidx {{session('nombre')}} {{session('apellido')}}</h1>
@error('permiso')
    <small>{{$message}}</small>
@enderror
@endsection