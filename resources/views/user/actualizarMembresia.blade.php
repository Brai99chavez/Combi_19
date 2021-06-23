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
            <button type="submit" class="botones">Modificar Membresia</button>
        </form>
    </div>
@else
    <div class="formulary">
        <h2>Membresia actual: GOLDEN</h2>
        <ul>
            <li><p>Beneficios actuales: {{$golden[0]->descuento}}% de descuento en la compra de pasajes</p></li>
        </ul>

        <a href="{{route('processingMembresiaUpdateBasic')}}">
            <button class="botones dar-baja" id="mybutton" type="submit">Dar de baja</button>
        </a>

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
    title: '<em>{{$message}}</em>',
    icon: 'success',
    iconColor: '#105671',
    confirmButtonColor: '#105671',
    confirmButtonText: 'ok'
})
</script>
@enderror
@error('fechaVenc')
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
@error('codigo')
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

@section('js')
<script>

$('.dar-bajar').submit (function (e) {

e.preventDefault();

Swal.fire({
title: 'Confirmar eliminacion',
text: "no podras revertir esto!",
icon: 'warning',
iconColor: '#105671',
showCancelButton: true,
confirmButtonColor: '#105671',
confirmButtonText: 'Si, eliminar!',
cancelButtonText: 'Cancelar'
}).then((result) => {
if (result.isConfirmed){
this.submit();
}
})
});


    // var button = document.getElementById("mybutton");

    // button.onclick = function(){
        
    //     Swal.fire({
    //     title: 'Confirmar Baja',
    //     icon: 'warning',
    //     iconColor: '#105671',
    //     showCancelButton: true,
    //     confirmButtonColor: '#105671',
    //     confirmButtonText: 'Si, eliminar!',
    //     cancelButtonText: 'Cancelar'
    //     }).then((result) => {
    // if (result.isConfirmed){
    //     this.submit();
    // }
    // })
	// }

</script>
@endsection
