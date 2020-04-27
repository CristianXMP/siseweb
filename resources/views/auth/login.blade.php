 <!DOCTYPE html>
 <html lang="en">
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
                <form action="">
                    <div class="form-group">
                        <input type="text" class="style-input" placeholder="Nombre de usuario" name="username" >
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