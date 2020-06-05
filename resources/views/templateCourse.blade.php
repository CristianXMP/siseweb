<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('img/favicon-siseweb.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style-tem-course.css') }}">
    @yield('style')
    <title>Aula virtual</title>

</head>
<body>
    @include('sweetalert::alert')
    <header class="shadow-sm">
        <div class="container">
            <div class="">
                <nav class="navbar navbar-expand-lg" role="navigation">
                    <div class="navbarHeader">
                        <img src="{{ asset('img/siseweb.png') }}" alt="">
                    </div>
                    <button class="navbar-toggler first-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <div class="animated-icon1"><span></span><span></span><span></span></div>
                      </button>

                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav ml-auto">
                              <li class="nav-item"><a href="#">Mis cursos</a></li>
                              <li class="nav-item">
                                  <a href="#" class="message">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px" 
                                    preserveAspectRatio="x200Y200 meet"
                                    ><path d="M0 0h24v24H0z" fill="none"/><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4V8l8 5 8-5v10zm-8-7L4 6h16l-8 5z"/></svg>
                                    <span class="sec counter counter-lg">+9</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="#">{{ Auth::user()->nombre }}
                                      <img class="img-profile"
                                          src="{{ asset('img/profile-example.jpg') }}" alt="">
                                  </a>
                              </li>

                              <li class="nav-item">
                                <a class="btn-logout" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                               
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M10.09 15.59L11.5 17l5-5-5-5-1.41 1.41L12.67 11H3v2h9.67l-2.58 2.59zM19 3H5c-1.11 0-2 .9-2 2v4h2V5h14v14H5v-4H3v4c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/></svg>
                                Salir

                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                             </form>
                              </li>
                          </ul>
                      </div>

                </nav>
            </div>

            {{-- <div class="d-sm-block d-md-none">
                <div class="row content-menu">
                    <div class="navbarHeader">
                        <h2>LOGO</h2>
                    </div>
                    <div>
                        <button class="navbar-toggler first-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent20"
                        aria-controls="navbarSupportedContent20" aria-expanded="false" aria-label="Toggle navigation">
                        <div class="animated-icon1"><span></span><span></span><span></span></div>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent20">
                            <ul>
                                <li>Inicio</li>
                                <li>Mis cursos</li>
                                <li>Notification</li>
                                <li>Diego Andres</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> --}}
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


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    @yield('scripts')
    <script>
        $(function () {
     $('[data-toggle="tooltip"]').tooltip()
   })
 </script>
</body>
</html>
