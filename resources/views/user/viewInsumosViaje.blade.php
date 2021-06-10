@extends('user.userLayout')
@section('title', 'Insumos')
@section('headerTitle')
    <h1>Insumos asignados</h1>
@endsection
@section('content')
    <div class="formulary">
        @if($insumos->count()>0)
            <h2>Detalles de los insumos</h2>
            @foreach($insumos as $insumo)
                <ul>
                    <li>
                        <strong><p>{{$insumo->nombre}}</p></strong> 
                        <p>{{$insumo->descripcion}}</p>
                        <p>Precio ${{$insumo->precio}}</p>
                    </li>
                </ul>
            @endforeach 
        @else
            <h2>Este viaje no tiene insumos asignados</h2>
        @endif
    </div>
@endsection