@extends('admin.layout')
@section('title', 'Home Membresia')
@section('content')
<ul>
    @foreach($membresias as $membresia)
        <li>
            {{$membresia->nombre}}
        </li>
    @endforeach
</ul>
@endsection