@extends('admin.layout')
@section('title', 'Registrar Insumo')
@section('headerTitle', 'Registrar Insumo')
@section('content')

    <form action="{{route('createinsumoshow')}}" method="POST" class="formulary">
        @csrf

            <strong>NOMBRE:</strong>
            <br>
            <input type="text" name="nombre">
            <br>
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
            <br>
            <strong>PRECIO:</strong>
            <br>
            <input type="number" name="precio">
            <br>
            @error('precio')
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
            <br>
            <strong>DESCRIPCION</strong>
            <br>
            <input type="text" name="descripcion">
            <br>
            <strong>DISPONIBLE</strong>
            <br>
            <select name="disponible" id="" >
                <option value="0">NO</option>
                <option value="1">SI</option>
            </select>
            <br>
        <button class="botones" type="submit">CARGAR INSUMO</button>
    </form>
@endsection