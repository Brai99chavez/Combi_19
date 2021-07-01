@extends('admin.layout')
@section('title','Modificar Ciudad')
@section('headerTitle', 'Modificar Ciudad')
@section('content')
<div class="formulary">    
    <h2>Editar Ciudad</h2>
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
        <strong>nombre</strong><br>
        <input name="nombre" type="text" value="{{$ciudades[0]->nombre}}"><br>
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
        <strong>direccion:</strong><br>
        <input name="direccion" type="text" value="{{$ciudades[0]->direccion}}"><br>
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
        <strong>disponible:</strong><br>
        <select name="disponible" id="" value="{{$ciudades[0]->disponible}}"><br>   
            <option value="1">SI</option>
            <option value="0">NO</option>
        </select>
        <br>
        <input type="hidden" name="id_ciudad" value="{{$ciudades[0]->id_ciudad}}">
        <button class="botones" type="submit">Modificar Ciudad</button>
    </form>
</div>
@endsection