@extends('user.userLayout')
@section('title', 'Actualizar Membresia')
@section('headerTitle')
    <h1>Actualizar Membresia</h1>
@endsection  
@section('content')
@if(session('id_membresia')==1)
    <div class="formulary">
    <h2>Membresia actual: BASIC</h2>
    <ul>
            <li><p>Acceda a la membresia GOLDEN y obtenga beneficios y descuento del {{$golden[0]->descuento}}% para sus proximos viajes</p></li>
            <li><p>Costo de membresia: $xxx</p></li>
            <li><p>Para el pago de la membresia GOLDEN ingrese una tarjeta de credito</p></li>
    </ul>
        <form action="{{route('processMembresiaClienteGolden')}}" method="post">
            <br>
            @csrf
            <strong>
                Número de tarjeta 
                <br>
                <input type="text" placeholder="16 digitos" name="tarjeta">
            </strong>
            <br><br>
            <strong>
                Vencimiento 
                <br>
                <input type="month" name="fechaVenc">
            </strong>
            <br><br>
            <strong>
                Codigo de Seguridad - CVV
                <br>
                <input type="text" placeholder="3 digitos detras de la tarjeta" name="codigo">
            </strong>
            <br>
            <button type="submit" class="botones">Realizar Pago</button>
        </form>
    </div>
@else
    <div class="formulary">
        <h2>Membresia actual: GOLDEN</h2>
        <ul>
            <li><p>Beneficios actuales: {{$golden[0]->descuento}}% de descuento en la compra de pasajes</p></li>
        </ul>
        <a href="{{route('processingMembresiaUpdateBasic')}}"><button class="botones">Dar de baja</button></a>
        <form action="{{route('processingUpdateTarjetaCliente')}}" method="POST">
            <br>
            @csrf
            <hr>
            <h2>Actualice su tarjeta de pago</h2>
            <strong>
                Número de tarjeta 
                <br>
                <input type="text" placeholder="16 digitos" name="tarjeta">
            </strong>
            <br><br>
            <strong>
                Vencimiento 
                <br>
                <input type="month" name="fechaVenc">
            </strong>
            <br><br>
            <strong>
                Codigo de Seguridad - CVV
                <br>
                <input type="text" placeholder="3 digitos detras de la tarjeta" name="codigo">
            </strong>
            <br>
            <button type="submit" class="botones">Actualizar Tarjeta</button>
        </form>
    </div>
@endif
@error('tarjeta')
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
@error('fechaVenc')
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
@error('codigo')
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
@error('success')   
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
@endsection