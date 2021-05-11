<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('head')
</head>
<body>
    <nav>
        <form action="{{route('logOut')}}" method="POST">
            @csrf
            <button type="submit" >
                Cerrar Sesion
            </button>
        </form>
    </nav>
    @yield('content')
</body>
</html>