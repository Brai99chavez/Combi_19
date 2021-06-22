
@extends('admin.layout')

@section('title', 'Actualizar viaje')

@section('content')
<div class="formulary">
    <h1>Actualizar viaje</h1>
    <form action="{{route('updateviajesprocess')}}" method="POST">
        @csrf
        <br>
        <input type="hidden" name="id_viaje" value="{{$viaje[0]->id_viaje}}">
        <input type="hidden" name="ladeHoy" value="{{date("Y-m-d")}}">
        <input type="hidden" name="fechaactual" value="{{$viaje[0]->fecha}}">
        <label> Fecha 
            <input type="date" name="fecha" value="{{$viaje[0]->fecha}}">
        </label><br><br>
        <label>
            Chofer
            <select name="id_chofer">
                <option value="{{$viaje[0]->id_chofer}}" selected>{{$viaje[0]->chofer}}</option>
                @foreach($Choferes as $chofer)
                    @if($chofer->id_permiso == 2)
                        <option value="{{$chofer->id_usuario}}">{{$chofer->nombre}}</option>
                    @endif    
                @endforeach
            </select>
        </label> <br> 
        <label>
            Combi
            <select name="id_combi">
                <option value="{{$viaje[0]->id_combi}}" selected>{{$viaje[0]->combi}}</option>
                @foreach($Combis as $combi)
                    <option value="{{$combi->id_combi}}">{{$combi->patente}}</option>
                @endforeach
            </select>
        </label><br><br>
        <label>
            Horario
            <input type="time" name="hora" value="{{$viaje[0]->hora}}">
        </label> <br><br>
        <label>
            Precio
            <input type="text"  name="precio" value="{{$viaje[0]->precio}}" autocomplete="off" >
        </label>
        <br><br>
        <label>
            Origen
            <select name="origen">
                @foreach($ciudades as $ciudad)
                    @if($ciudad->nombre == $viaje[0]->origen)
                        <option value="{{$ciudad->id_ciudad}}" selected>{{$ciudad->nombre}}</option>    
                    @else
                        <option value="{{$ciudad->id_ciudad}}">{{$ciudad->nombre}}</option>
                    @endif
                @endforeach
            </select>
        </label>
        <br><br>
        <label>
            Destino
            <select name="destino">
                @foreach($ciudades as $ciudad)
                    @if($ciudad->nombre == $viaje[0]->destino)
                        <option value="{{$ciudad->id_ciudad}}" selected>{{$ciudad->nombre}}</option>    
                    @else
                        <option value="{{$ciudad->id_ciudad}}">{{$ciudad->nombre}}</option>
                    @endif
                @endforeach
            </select>
        </label>
        <br><br>
        <label>
            N° Pasajes
            <input type="text" value="{{$viaje[0]->cantPasajes}}" name="cantPasajes">
        </label>
        <br><br>
        <label>
            Estado
            <select name="estado">
                @if($viaje[0]->estado == "Pendiente")
                    <option value="Pendiente" selected>Pendiente</option>
                    <option value="Cancelado">Cancelado</option>
                @else
                    <option value="Cancelado" selected>Cancelado</option>
                    <option value="Pendiente">Pendiente</option>
                @endif
            </select>
        </label>
        <br><br>
        <button type="submit" class="botones">Guardar cambios</button>
    </form>
</div>
@error('fecha')
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