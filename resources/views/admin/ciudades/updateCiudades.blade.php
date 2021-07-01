@extends('admin.layout')
@section('title','Modificar Ciudad')
@section('headerTitle', 'Modificar Ciudad')
@section('content')
<div class="formulary">    
<form action="{{route('updateciudadprocess')}}" method="POST" >
    @csrf
        @error('nombre')
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
        <h2>nombre</h2>
        <input name="nombre" type="text" value="{{$ciudades[0]->nombre}}">
        @error('direccion')
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
        <h2>direccion:</h2>
        <input name="direccion" type="text" value="{{$ciudades[0]->direccion}}">
        @error('disponible')
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
        <h2>disponible:</h2>
        <select name="disponible" id="" value="{{$ciudades[0]->disponible}}">
            <option value="1">SI</option>
            <option value="0">NO</option>
        </select>
        <br>
        <input type="hidden" name="id_ciudad" value="{{$ciudades[0]->id_ciudad}}">
        <button class="botones" type="submit">Modificar Ciudad</button>
    </form>
</div>
@endsection