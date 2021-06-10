@extends('user.userLayout')

@section('title', 'Mis Viajes')

@section('navTitle')
{{session('nombre')}} {{session('apellido')}}
@endsection
        
@section('content')
@error('sucess')
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
    <div class="formulary">
        <h2>Mis viajes</h2>
    </div>
    @if($viajes->isNotEmpty())
            @foreach($viajes as $viaje)
        <div class="formulary"> 
        <tr>

            Chofer: <td>{{$viaje->chofer}}</td><br>
            Patente: <td>{{$viaje->patente}}</td><br>
            Categoria: <td>{{$viaje->categoria}}</td><br>
            Insumos: <td>
                   @foreach($viaje_insumos as $v_i)
                       @if($viaje->id_viaje == $v_i->id_viaje)
                        {{$v_i->nombre}},
                       @endif
                   @endforeach
                  </td><br>
            Fecha: <td>{{$viaje->fecha}} </td> 
            // Hora: <td>{{$viaje->hora}}</td> <br>
            Origen: <td>{{$viaje->origen}}</td> 
            // Destino: <td>{{$viaje->destino}}</td> <br>
            Precio: <td>{{$viaje->precio}}$</td> <br>
            


        </tr>
        <br>
        <form action="{{route('guardarComentario')}}" method="post" >
            @csrf
            Comentario:
            <input type="hidden" name="id_pasaje" value="{{$viaje->id_pasaje}}">
            <textarea name="descripcion" id="" cols="30" rows="" placeholder="escriba un comentario..." style="min-width: 100%"></textarea>
            <button type="submit" class="botones">Publicar Comentario</button>
        </form>

       
         @if($viajes->isNotEmpty())
            @foreach($comentarios as $com)

                  {{$com->descripcion}} ,
                  {{$com->fecha}} ,
                  {{$com->hora}} , 
                  
                  <br>

            @endforeach
        @endif
          
   


        </div>   



        @endforeach
        
        @else
        <script>
            Swal.fire({
                icon: 'warning',
                iconColor: '#48C9B0',
                title: '<strong style= "color: white; font-family: arial;"> No hay viajes</strong>',
                background:'#404040',
                confirmButtonColor: '#45B39D ',
                confirmButtonText: 'Got it!' ,
            })
        </script>
        @endif


 
@error('permiso')
    <small>{{$message}}</small>
@enderror
@endsection



