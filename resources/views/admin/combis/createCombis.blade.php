@extends('admin.layout')
@section('title','Registro Combi')
@section('headerTitle', 'Registro Combi')
@section('content')
<div class="formulary">
    <h2>Agregar Combi</h2>
    <form action="{{route('createcombisprocess')}}" method="POST">
        @csrf
        @error('patente')
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
        <strong>Patente</strong><br>
        <input name="patente" type="text"><br>
        @error('modelo')
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
        <strong>Modelo:</strong><br>
        <input name="modelo" type="text"><br>
        @error('color')
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
        <strong>Color:</strong><br>
        <input name="color" type="text"><br>
        @error('cant_asientos')
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
        <strong>Cantidad Asientos:</strong><br>
        <input name="cant_asientos" type="text"><br>
        @error('categoria')
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
        <strong>Categoria:</strong><br>
        <select name="id_categoria" id="">
            <option value="1">Comoda</option>
            <option value="2">Super Comoda</option>
        </select>
        <br>
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
        <button class="botones" type="submit">Cargar Combi</button>
    </form>
</div>
@endsection
