@extends('user.userLayout')
@section('title', 'viajesDisponibles')
@section('headerTitle')
    <h1>Buscando Viajes</h1>
@endsection
@section('content')
    <div class="formulary">
        <form action="{{route('buscarViajesProcess')}}" method="POST">
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