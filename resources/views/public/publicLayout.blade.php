<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="../resources/css/style.css">
    <link rel="stylesheet" href="../resources/css/navbar.css">
    <link rel="stylesheet" href="../resources/css/table.css">
    <link rel="stylesheet" href="../resources/css/formularys.css">
    <script src="../resources/js/navbar.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @yield('head')
</head>
<body>
    <nav>
        <div class="logo"><img src="../resources/imagenes/logo_nav.png" alt=""></div>
        <div class="openMenu"><i class="fa fa-bars"></i></div>
        <ul class="mainMenu">
            <li><a href="{{route('login')}}" aria-current="page">Login</a></li>
            <li><a href="{{route('register')}}">Register</a></li>
            <li><a href="{{route('/')}}">About</a></li>
            <div class="closeMenu"><i class="fa fa-times"></i></div>
            <span class="icons">
                <i class="fab fa-facebook"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter"></i>

            </span>
        </ul>
    </nav>
    <div class="telefono">
        <p>Telefono: (0221)153141464</p>
    </div>
    <main>
            @yield('content')
    </main>
    
    <div class="footer">
        <div class="redes">
            <i class="fab fa-facebook" ></i>
            <p>Facebook</p>
        </div>
        <div class="redes">
            <i class="fab fa-instagram"></i>
            <p>Instagram</p>
        </div>
        <div class="redes">
            <i class="fab fa-twitter"></i>
            <p>Twitter</p>
        </div>
    </div>
</body>
</html>