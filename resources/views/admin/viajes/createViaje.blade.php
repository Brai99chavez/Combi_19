@extends('admin.layout')

@section('title', 'Cargar Viaje')

@section('headerTitle', 'Cargar Viaje')

@section('content')
    <div class="formulary">
    
    <form action="{{route('createviajeprocess')}}" method="POST">
        @csrf
        <input type="hidden" name="fecha" value="{{$fecha}}">
        <label>
            CHOFER
            @if($choferes->count()>0)
                <select name="id_chofer">
                    @foreach($choferes as $chofer)
                        @if($chofer->id_permiso == 2)
                            <option value="{{$chofer->id_usuario}}">
                                {{$chofer->nombre}}
                            </option>
                        @endif    
                    @endforeach
                </select>
            @else
                <script>
                    Swal.fire({
                    title: 'No hay choferes disponibles',
                    icon: 'success',
                    iconColor: '#105671',
                    confirmButtonColor: '#105671',
                    confirmButtonText: 'ok'
                })
                    </script>
            <select name="id_chofer">
                <option value="">NO HAY CHOFERES DISPONIBLES</option>
            </select>
            @endif
        </label>
        <br>
        <label>
            COMBIS
            <select name="id_combi">
                @if($combis->count()>0)
                @foreach($combis as $combi)
                <option value="{{$combi->id_combi}}">
                    {{$combi->patente}}
                </option>
                @endforeach
                @else
                <script>
                    Swal.fire({
                    title: 'No hay combis disponibles',
                    icon: 'success',
                    iconColor: '#105671',
                    confirmButtonColor: '#105671',
                    confirmButtonText: 'ok'
                })
                    </script>
                @endif
            </select>
        </label>
        <br>
        <label>
            FECHA
            {{$fecha}}
        </label>
        <label>
            <br><br>
            HORA
            <input type="time" name="hora">
        </label>
        <br>
        <label>
            PRECIO
            <input type="text" name="precio" autocomplete="off">
        </label>
        <br>
        <label>
            ORIGEN
            <select name="origen">
                @if($ciudades->count()>0)
                @foreach($ciudades as $ciudad1)
                <option value="{{$ciudad1->id_ciudad}}">
                    {{$ciudad1->nombre}}
                </option>
                @endforeach
                @else
                <script>
                    Swal.fire({
                    title: '<em>No hay ciudades disponibles</em>',
                    icon: 'success',
                    iconColor: '#105671',
                    confirmButtonColor: '#105671',
                    confirmButtonText: 'ok'
                })
                </script>
                @endif
            </select>
        </label>
        <br>
        <label>
            DESTINO
            <select name="destino">
                @foreach($ciudades as $ciudad2)
                <option value="{{$ciudad2->id_ciudad}}">
                    {{$ciudad2->nombre}}
                </option>  
                @endforeach
            </select>
        </label>
        <br>
        <button type="submit" class="botones"> Cargar viaje</button>
    </form>
    </div>
@error('id_chofer')
<script>
    Swal.fire({
    title: '{{$message}}',
    icon: 'success',
    iconColor: '#105671',
    confirmButtonColor: '#105671',
    confirmButtonText: 'ok'
    })
</script>
@enderror
@error('id_combi')
    <script>
        Swal.fire({
            title: '{{$message}}',
            icon: 'success',
            iconColor: '#105671',
            confirmButtonColor: '#105671',
            confirmButtonText: 'ok'
        })
    </script>
@enderror
@error('hora')
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
@error('precio')
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
@error('destino')
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