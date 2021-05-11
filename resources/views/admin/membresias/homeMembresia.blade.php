@extends('admin.layout')
@section('title', 'Home Membresia')
@extends('admin.layout2')
@section('content')
<P>MEMBRESIAS</P>
<ul>
    @foreach($membresias as $membresia)
        <li>
            {{$membresia->nombre}}
        </li>
    @endforeach
</ul>
@endsection