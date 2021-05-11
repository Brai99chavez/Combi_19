<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="../resources/css/style.css">
    <link rel="stylesheet" href="../resources/css/navbar.css">
    <link rel="stylesheet" href="../resources/css/formulary.css">
    @yield('head')
</head>
<body>
        <!-- HEADER ENCABEZADO-->
        <header class="header">
            <div class="logo">
                <img src="../resources/imagenes/combi_19_logo.png" alt="">
                <h1>Administrator page</h1>
            </div>
            <nav class="menu">
                <a href="{{route('homeadmin')}}">HOME</a>
                <a href="{{route('homeviajes')}}">VIAJES</a>
                <a href="{{route('homeinsumos')}}">INSUMOS</a>
                <a href="{{route('homemembresias')}}">MEMBRESIAS</a>
                <a href="{{route('homecombis')}}">COMBIS</a>
                <a href="{{route('homechoferes')}}">CHOFERES</a>
                <a href="{{route('logOut')}}"> CERRAR SESION</a>
            </nav>
        </header>
        @yield('content')

</body>
</html>