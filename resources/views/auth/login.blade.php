 <!DOCTYPE html>
 <html lang="es">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>OpenSoft | Login</title>
 </head>
<body>

    <div id="fondo-img">
        <div id="box-login">
            <div id="login-box-body">
                <div class="logo-login">
                    <a href="/">
                        <img src="{{ asset('img/logo-opensoft.png') }}" class="img-responsive">
                    </a>
                </div>
                <h2>Aula Virtual</h2>
            <form action="{{Route('login')}}" method="POST">
                @csrf
                    <div class="form-group">
                        <input id="email" type="email" placeholder="Correo Electronico" class="style-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" class="style-input" placeholder="Contraseña" name="password" >
                    </div>

                    <div class="option-login">
                        <button class="btn-submit">Ingresar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="particles"></div>

 </body>
 </html>
