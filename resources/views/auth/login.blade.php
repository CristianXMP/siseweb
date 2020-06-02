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
    @include('sweetalert::alert')
    <div id="fondo-img">
        <div id="box-login">
            <div id="login-box-body">
                <div class="logo-login">
                    <a href="/">
                        <img src="{{ asset('img/siseweb.png') }}" class="img-responsive">
                    </a>
                </div>
                <h2>Aula Virtual</h2>
            <form action="{{Route('login')}}" method="POST">
                @csrf
                    <div class="form-group">
                        <input id="cedula" class="style-input" type="text" placeholder="Numero De Documento"  name="cedula" value="{{ old('cedula') }}" autocomplete="cedula" >


                    </div>

                    <div class="form-group">
                        <input type="password" class="style-input" placeholder="Contraseña" name="password" >
                    </div>
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                        <label class="custom-control-label" for="customControlInline" style="font-size: 15px">Recuerdame</label>
                    </div>

                    <div class="option-login">
                        <button type="submit" class="btn-submit">Ingresar</button>
                    </div>

                </form>
                    <a href="" class="recover-pass">¿Has olvidado tu contrañesa?</a>
            </div>

            
            
        </div>
    </div>

    <div id="particles"></div>

 </body>
 </html>