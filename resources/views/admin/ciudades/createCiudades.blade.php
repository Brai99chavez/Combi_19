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
                title: '<em>{{$message}}</em>',
                icon: 'error',
                iconColor: '#105671',
                confirmButtonColor: '#105671',
                confirmButtonText: 'ok'
            })
            </script>
        @enderror
        <strong>Nombre</strong><br>
        <input name="nombre" type="text" ><br>
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
        <strong>Direccion</strong><br>
        <input name="direccion" type="text"><br>
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
        <strong>Disponible</strong><br>
        <select name="disponible" id="">
            <option value="1">SI</option>
            <option value="0">NO</option>
        </select>

        <button class="botones" type="submit">Registrar Ciudad</button>

    </form>
</div>
@endsection