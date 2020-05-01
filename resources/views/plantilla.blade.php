<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Soft</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{ asset('datatables/dataTables.bootstrap4.css') }}"> --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('style')
</head>
<body>

    @include('sweetalert::alert')
    <div class="container-fluid">
        <div class="row">
            <header class="col-12 headLogin">
                <div class="d-none d-md-block">
                    <div class="row" id="logo-principal">
                        <div class="col-12 col-md-4">
                            <div class="navbar-brand">
                                <img src="{{ asset('img/siseweb.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-md-8 info-user">
                            <h2>Diego Andres Rambao Jimenez</h2>
                            <a href="" class="btn-logout">Salir
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="d-sm-block d-md-none">
                    <div class="row">
                        <div class="header-mobile col-12">
                            <nav class="navbar navbar-light">
                                <div class="navbar-brand">
                                    <img src="{{ asset('img/siseweb.png') }}" alt="">
                                </div>

                                <button class="navbar-toggler first-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent20"
                                aria-controls="navbarSupportedContent20" aria-expanded="false" aria-label="Toggle navigation">
                                <div class="animated-icon1"><span></span><span></span><span></span></div>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent20">
                                    <h2>DIEGO ANDRES RAMBAO JIMENEZ</h2>

                                    <div class="row">
                                      {{-- Component navbar --}}
                                      @component('components/navbar')

                                      @endcomponent
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>

            </header>
        </div>

        <div class="row">
            <div class="col-12 col-md-4 col-lg-3 d-none d-md-block" style="    margin-top: 30px;
            ">
                <div class="row">
                    <div class="col-12">
                        <div class="contNav" id="divNavigationView">
                          {{-- Component navbar --}}
                            @component('components/navbar')

                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-8 col-12 col-lg-9">
                <div class="shadow p-3 mb-5 bg-white rounded contentBody">

                    {{-- Aqui va el contenido  --}}
                  @yield('content')

                </div>

            </div>

        </div>

        <footer>
            <div class="row justify-content-between">
                <p>Todos los derechos reservados @</p>
            </div>
        </footer>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{ asset('datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('datatables/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
<script>
      <script>
           $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    </script>
</script>
  @yield('script')
</body>
</html>
