@extends('admin.layout')
@section('title','Modificar Combi')
@section('headerTitle', 'Modificar Combi')
@section('content')
<div class="formulary">    
<form action="{{route('updatecombiprocess')}}" method="POST" >
    @csrf
        @error('patente')
        <script>
            Swal.fire({
                icon: 'warning',
                iconColor: '#48C9B0',
                title: '<strong style= "color: white; font-family: arial;"> {{$message}}</strong>',
                background:'#404040',
                confirmButtonColor: '#45B39D ',
                confirmButtonText: 'Got it!' ,
            })
        </script>
        @enderror
        <strong>Patente</strong><br>
        <input name="patente" type="text" value="{{$combi[0]->patente}}"><br>
        @error('modelo')
        <script>
            Swal.fire({
                icon: 'warning',
                iconColor: '#48C9B0',
                title: '<strong style= "color: white; font-family: arial;"> {{$message}}</strong>',
                background:'#404040',
                confirmButtonColor: '#45B39D ',
                confirmButtonText: 'Got it!' ,
            })
        </script>
        @enderror
        <strong>Modelo:</strong><br>
        <input name="modelo" type="text" value="{{$combi[0]->modelo}}"><br>
        @error('color')
        <script>
            Swal.fire({
                icon: 'warning',
                iconColor: '#48C9B0',
                title: '<strong style= "color: white; font-family: arial;"> {{$message}}</strong>',
                background:'#404040',
                confirmButtonColor: '#45B39D ',
                confirmButtonText: 'Got it!' ,
            })
        </script>
        @enderror
        <strong>Color:</strong><br>
        <input name="color" type="text" value="{{$combi[0]->color}}"><br>
        @error('cant_asientos')
        <script>
            Swal.fire({
                icon: 'warning',
                iconColor: '#48C9B0',
                title: '<strong style= "color: white; font-family: arial;"> {{$message}}</strong>',
                background:'#404040',
                confirmButtonColor: '#45B39D ',
                confirmButtonText: 'Got it!' ,
            })
        </script>
        @enderror
        <strong>Cantidad Asientos:</strong><br>
        <input name="cant_asientos" type="text" value="{{$combi[0]->cant_asientos}}"><br>
        @error('categoria')
        <script>
            Swal.fire({
                icon: 'warning',
                iconColor: '#48C9B0',
                title: '<strong style= "color: white; font-family: arial;"> {{$message}}</strong>',
                background:'#404040',
                confirmButtonColor: '#45B39D ',
                confirmButtonText: 'Got it!' ,
            })
        </script>
        @enderror
        <strong>Categoria:</strong><br>
        <select name="id_categoria" id="" value="{{$combi[0]->categoria}}">
            <option value="1">Comoda</option>
            <option value="2">Super Comoda</option>
        </select>
        <br>
        <input type="hidden" name="id_combi" value="{{$combi[0]->id_combi}}">
        <button class="botones" type="submit">Modificar Combi</button>

    </form>
</div>
@endsection