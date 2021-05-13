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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @yield('head')
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="../resources/imagenes/combi_19_logo.png" alt="">
            <h1>@yield('navTitle')</h1>
        </div>
        <nav class="menu">
            <a href="{{route('/')}}">Home Publico</a>
            <a href="{{route('login')}}">Iniciar Sesion</a>
            <a href="{{route('register')}}">Registrarse</a>
        </nav>
    </header>
    @yield('content')
</body>
</html>