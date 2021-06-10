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
    <link rel="stylesheet" href="../resources/css/table.css">
    <script src="https://kit.fontawesome.com/0172a1fd00.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @yield('head')
</head>
<body>
        <!-- HEADER ENCABEZADO-->
        <header class="header">
            <div class="logo">
                <img src="../resources/imagenes/combi_19_logo.png" alt="">
                <h1>@yield('headerTitle')
                </h1>
            </div>
            <nav class="menu">
                @yield('navLinks')
                <a href="{{route('logOut')}}"> CERRAR SESION</a>
            </nav>
        </header>
        <br>
        <br>
        <br>
        <br>
        @yield('content')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js%22%3E</script>
            @yield('content')
            @yield('js')
</body>
</html>