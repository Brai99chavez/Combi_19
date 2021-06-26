@extends('public.publicLayout')

@section('title', 'registro')

@section('navTitle', 'Registro')

@section('content')


<div class="formulary">

    <h2>Registrar Como Basic</h2>
    <form action="{{route('guardarRegistro')}}" method="POST" style="display: flex">
        <div>
            <br>
            @csrf
            <strong>
                Nombre:*
                <br>
                <input type="text" name="nombre" value="{{old('nombre')}}" placeholder="ExampleName.....">
            </strong>
            @error('nombre')
            <script>
                Swal.fire({
                    icon: 'warning',
                    iconColor: '#48C9B0',
                    title: '<strong style= "color: white; font-family: arial;"> {{$message}}</strong>',
                    background: '#404040',
                    confirmButtonColor: '#45B39D ',
                    confirmButtonText: 'Got it!',
                })

            </script>
            @enderror
            <br>
            <strong>
                Apellido:*
                <br>
                <input type="text" name="apellido" value="{{old('apellido')}}" placeholder="ExampleSurname....">
            </strong>
            @error('apellido')
            <script>
                Swal.fire({
                    icon: 'warning',
                    iconColor: '#48C9B0',
                    title: '<strong style= "color: white; font-family: arial;"> {{$message}}</strong>',
                    background: '#404040',
                    confirmButtonColor: '#45B39D ',
                    confirmButtonText: 'Got it!',
                })

            </script>
            @enderror
            <br>
            <strong>
                dni:*
                <br>

                <input type="number" name="dni" value="{{old('dni')}}" placeholder="987654321....">
            </strong>
            @error('dni')
            <script>
                Swal.fire({
                    icon: 'warning',
                    iconColor: '#48C9B0',
                    title: '<strong style= "color: white; font-family: arial;"> {{$message}}</strong>',
                    background: '#404040',
                    confirmButtonColor: '#45B39D ',
                    confirmButtonText: 'Got it!',
                })

            </script>
            @enderror
            <br>
            <strong>
                Email:*


                <input type="email" name="email" value="{{old('email')}}" placeholder="example@gmail.com.....">
            </strong>
            @error('email')
            <script>
                Swal.fire({
                    icon: 'warning',
                    iconColor: '#48C9B0',
                    title: '<strong style= "color: white; font-family: arial;"> {{$message}}</strong>',
                    background: '#404040',
                    confirmButtonColor: '#45B39D ',
                    confirmButtonText: 'Got it!',
                })

            </script>
            @enderror
            <br>
            <strong>
                Contraseña:*

                <input type="password" name="contraseña" value="{{old('contraseña')}}" placeholder="password......">
            </strong>
            @error('contraseña')
            <script>
                Swal.fire({
                    icon: 'warning',
                    iconColor: '#48C9B0',
                    title: '<strong style= "color: white; font-family: arial;"> {{$message}}</strong>',
                    background: '#404040',
                    confirmButtonColor: '#45B39D ',
                    confirmButtonText: 'Got it!',
                })

            </script>
            @enderror
        </div>
        <div style="margin-top: 30%">
            <button type="submit" class="botones"> Registro Basic</button>
            <br>
            <button onclick=location.href="{{route('registerGolden')}}" type="reset" class="botones"> Registro Golden</button>
        </div>
    </form>


</div>
@endsection
