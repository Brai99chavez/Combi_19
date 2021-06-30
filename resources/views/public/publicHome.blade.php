@extends('public.publicLayout')

@section('title','publicHome')

@section('navTitle','Public Home')

@section('content')

<div class="about">
    <h1>Bienvenido a Combi 19</h1>
    <p>somos una empresa de combis con un renovado sistema de organizacion.</p>
    <p>Ideal para viajar de forma segura en estos tiempos !!!</p>
    <br>
    <p>registrate como usuario golden para tener un 20% de descuento</p>
</div>

<div class="formulary">
    <h1>Donde Viajaras?</h1> <br> <br> 
        <form action="{{route('buscarViajesProcess2')}}" method="POST"  style="width: 380px;" >
            @csrf
            <input type="hidden" value="{{date('Y-m-d')}}" name="fechaActual">
            <p>Origen</p>
            <select name="origen">
                <option value="" selected>-----selecciona un origen-----</option>
                @foreach($ciudades as $ciudad)
                    <option value="{{$ciudad->id_ciudad}}">{{$ciudad->nombre}}</option>
                @endforeach
            </select>
            <p>Destino</p>
            <select name="destino">
                <option value="" selected>-----selecciona un destino-----</option>
                @foreach($ciudades as $ciudad)
                    <option value="{{$ciudad->id_ciudad}}">{{$ciudad->nombre}}</option> 
                @endforeach
            </select>
            <p>Fecha</p>
            <input type="date" name="fecha">
            <br><br>
            <button type="submit" class="botones">Buscar Viajes</button>
        </form>
        <br>
    </div>
@error('origen')
    <script>
        Swal.fire({
        title: '<em>{{$message}}</em>',
        icon: 'error',
        iconColor: '#105671',
        confirmButtonColor: '#105671',
        confirmButtonText: 'ok'
    })
    </script>
@enderror
@error('destino')
    <script>
        Swal.fire({
        title: '<em>{{$message}}</em>',
        icon: 'error',
        iconColor: '#105671',
        confirmButtonColor: '#105671',
        confirmButtonText: 'ok'
    })
    </script>
@enderror
@error('fecha')
    <script>
        Swal.fire({
        title: '<em>{{$message}}</em>',
        icon: 'error',
        iconColor: '#105671',
        confirmButtonColor: '#105671',
        confirmButtonText: 'ok'
    })
    </script>
@enderror  
@error('error')
    <script>
        Swal.fire({
        title: '<em>{{$message}}</em>',
        icon: 'success',
        iconColor: '#105671',
        confirmButtonColor: '#105671',
        confirmButtonText: 'ok'
    })
    </script>
@enderror

@endsection
