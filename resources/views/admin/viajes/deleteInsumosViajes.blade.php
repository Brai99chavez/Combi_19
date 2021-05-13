<label>
    ELIMINAR INSUMOS
    <form action="{{route('deleteinsumosviaje')}}" method="POST">
        @csrf
        <input type="hidden" name="id_viaje" value="{{$id_viaje}}">
        @foreach($insumos as $insumo)               
            <input type="checkbox" name="insumo[]"value="{{$insumo->id_insumos}}">{{$insumo->nombre}}
        @endforeach
        <button type="submit">CARGAR INSUMOS</button>
    </form>
    <!-- NO ESTA TERMINADOOOOOOOOOOOOOOOOOOOOOOOOOOO-->
</label>