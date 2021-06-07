@extends('admin.layout')
@section('title', 'Update Insumo')
@section('content')
        <form action="{{route('updateinsumos1')}}" method="POST" class="formulary">
            @csrf
                <strong>NOMBRE:</strong>
                <br>
                <input type="text" name="nombre" value="{{$insumo[0]->nombre}}">
                <br>
                @error('nombre')
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
                <br>
                <strong>PRECIO:</strong>
                <br>
                <input type="number" name="precio" value="{{$insumo[0]->precio}}">
                <br>
                @error('precio')
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
                <br>
                <strong>DESCRIPCION</strong>
                <br>
                <input type="text" name="descripcion" value="{{$insumo[0]->descripcion}}">
                <br>
                <strong>DISPONIBLE</strong>
                <br>
                <select name="disponible" id="" >
                    @if($insumo[0]->disponible == 1)
                        <option value="1" selected>SI</option>
                        <option value="0">NO</option>    
                    @else
                        <option value="0" selected>NO</option>
                        <option value="1">SI</option>
                    @endif
                </select>
                <br>
                <input type="hidden" name="id_insumos" value="{{$insumo[0]->id_insumos}}">
            <button class="botones" type="submit">ACTUALIZAR INSUMO</button>
        </form>
@endsection