@extends('user.userLayout')
@section('title', 'Mis Viajes')
@section('headerTitle')
<h1>Mis Viajes</h1>
@endsection   
@section('content')
    <div class="formulary">
        <h2>Mis viajes</h2>
    </div>
    @if($viajes->isNotEmpty())
            @foreach($viajes as $viaje)
        <div class="formulary">
        <tr>
             <td>Fecha: {{$viaje->fecha}} </td> 
             <td>Hora: {{$viaje->hora}}</td> <br>
             <td>Origen: {{$viaje->origen}}</td> 
             <td>Destino: {{$viaje->destino}}</td> <br>
             <td>Precio: {{$viaje->precio}}$</td> <br>
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
            title: '<em>No hay viajes</em>',
            icon: 'success',
            iconColor: '#105671',
            confirmButtonColor: '#105671',
            confirmButtonText: 'ok'
        })
        </script>
        @endif
@error('success')
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



