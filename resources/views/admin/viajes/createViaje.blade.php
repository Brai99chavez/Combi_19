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
                    icon: 'warning',
                    iconColor: '#48C9B0',
                    title: '<strong style= "color: white; font-family: arial;">No hay choferes disponibles</strong>',
                    background:'#404040',
                    confirmButtonColor: '#45B39D ',
                    confirmButtonText: 'Got it!' ,
                })
            </script>
            <select name="id_chofer">
                <option value="">NO HAY CHOFERES DISPONIBLES</option>
            </select>
            @endif
        </label>
        @error('id_chofer')
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
                        icon: 'warning',
                        iconColor: '#48C9B0',
                        title: '<strong style= "color: white; font-family: arial;">No hay combis disponibles</strong>',
                        background:'#404040',
                        confirmButtonColor: '#45B39D ',
                        confirmButtonText: 'Got it!' ,
                    })
                </script>
                @endif
            </select>
        </label>
        @error('id_combi')
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
        <label>
            FECHA
            {{$fecha}}
        </label>
        <label>
            <br><br>
            HORA
            <input type="time" name="hora">
        </label>
        @error('hora')
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
        <label>
            PRECIO
            <input type="text" name="precio" autocomplete="off">
        </label>
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
                        icon: 'warning',
                        iconColor: '#48C9B0',
                        title: '<strong style= "color: white; font-family: arial;">No hay ciudades disponibles</strong>',
                        background:'#404040',
                        confirmButtonColor: '#45B39D ',
                        confirmButtonText: 'Got it!' ,
                    })
                </script>
                @endif
            </select>
        </label>
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
        <br>
        <button type="submit"> Cargar viaje</button>
    </form>
    </div>
@endsection