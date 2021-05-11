@section('homeInsumo')
    @foreach(@yield('colecction') as $insumo)
    {{$insumo->nombre}}
    {{$insumo->precio}}
    {{$insumo->descripcion}}
    <form action="{{route('updateinsumos')}}" method="POST">
        @csrf
        <input type="hidden" name="id_insumo" value="{{$insumo->id_insumos}}">
        <button type="submit">MODIFICAR</button>
    </form>
    <form action="{{route('deleteinsumos')}}" method="POST">
        @csrf
        <input type="hidden" name="id_insumo" value="{{$insumo->id_insumos}}">
        <button type="submit">ELIMINAR</button>
    </form>
    @endforeach
@endsection