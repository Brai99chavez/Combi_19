@extends('user.userLayout')

@section('title', 'home')

@section('navTitle')
{{session('nombre')}} {{session('apellido')}}
@endsection
        
@section('content')

@error('permiso')
    <small>{{$message}}</small>
@enderror
@endsection