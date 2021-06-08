@extends('admin.layout')
@section('title','Registro Ciudad')
@section('headerTitle', 'Registro Ciudad')
@section('content')
<div class="formulary">    
<form action="{{route('createciudadprocess')}}" method="POST" >
    @csrf
        @error('nombre')
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
        <strong>Nombre</strong><br>
        <input name="nombre" type="text" ><br>
        @error('direccion')
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
        <strong>Direccion</strong><br>
        <input name="direccion" type="text"><br>
        @error('disponible')
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
        <strong>Disponible</strong><br>
        <select name="disponible" id="">
            <option value="1">SI</option>
            <option value="0">NO</option>
        </select>

        <button class="botones" type="submit">Registrar Ciudad</button>

    </form>
</div>
@endsection