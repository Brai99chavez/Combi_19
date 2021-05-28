@extends('user.userLayout')

@section('title', 'home')

@section('navTitle')
{{session('nombre')}} {{session('apellido')}}
@endsection
        
@section('content')
  <div class="formulary">

     <h1>Bienvenido a Combi 19</h1>
     
  </div>
 
@error('permiso')
    <small>{{$message}}</small>
@enderror
@endsection