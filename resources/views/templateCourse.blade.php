<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style-tem-course.css') }}">
    @yield('style')
    <title>Aula virtual</title>

</head>
<body>
    <header class="shadow-sm">
        <div class="container">
            <nav class="navbar" role="navigation">
                <div class="navbarHeader">
                    <h2>LOGO</h2>
                </div>

                <ul class="nav justify-content-end">
                    <li class="nav-item"><a href="#">Mis cursos</a></li>
                    <li class="nav-item">
                        <a href="#">
                            <i class="fa fa-envelope"></i><span class="sec counter counter-lg">+9</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#">Diego Rambao 
                            <img class="img-profile" 
                                src="{{ asset('img/profile-example.jpg') }}" alt="">
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    {{-- <footer>
        <div class="">
            <p>Todos los derechos reservados @</p>
        </div>
    </footer> --}}
</body>
</html>