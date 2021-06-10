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
        icon: 'warning',
        iconColor: '#48C9B0',
        title: '<strong style= "color: white; font-family: arial;">{{$message}}</strong>',
        background:'#404040',
        confirmButtonColor: '#45B39D ',
        confirmButtonText: 'Got it!' ,
    })
</script>
@enderror
@error('destino')
<script>
    Swal.fire({
        icon: 'warning',
        iconColor: '#48C9B0',
        title: '<strong style= "color: white; font-family: arial;">{{$message}}</strong>',
        background:'#404040',
        confirmButtonColor: '#45B39D ',
        confirmButtonText: 'Got it!' ,
    })
</script>
@enderror
@error('fecha')
<script>
    Swal.fire({
        icon: 'warning',
        iconColor: '#48C9B0',
        title: '<strong style= "color: white; font-family: arial;">{{$message}}</strong>',
        background:'#404040',
        confirmButtonColor: '#45B39D ',
        confirmButtonText: 'Got it!' ,
    })
</script>
@enderror  
@error('success')
<script>
    Swal.fire({
        icon: 'warning',
        iconColor: '#48C9B0',
        title: '<strong style= "color: white; font-family: arial;">{{$message}}</strong>',
        background:'#404040',
        confirmButtonColor: '#45B39D ',
        confirmButtonText: 'Got it!' ,
    })
</script>
@enderror
@endsection