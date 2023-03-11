<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  
  <title>Medimas Solution Factory - Login</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="{{ asset('css/authlogin.css') }}">
  <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script>  -->
  
</head>
<body style="background-image: url({{ asset('img/acceso/bg-login.png') }});background-size: cover;">

    <div class="container" style="margin-top: 10%"> 

    <div class="row py-5 text-white">      

      <div class="col-md-6 offset-md-3 col-sm-12">
        <div class="d-flex align-content-center">
          <div class="container mb-5">
            <div class="row">
              <div class="col-md-12">
                <h3 class="login-heading mb-4 text-center">Bienvenido, inicie sesión</h3>

                @if(Session::has('message'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session('message') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login_users') }}">
                  @csrf
                  <div class="form-label-group">
                    <input type="text" name="usu_username" id="usu_username" class="form-control @error('usu_username') is-invalid @enderror" value="{{ old('usu_username') }}" required autocomplete="usu_username" autofocus>
                    <label for="usu_username">Usuario</label>

                    @error('usu_username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                  </div>

                  <div class="form-label-group">
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" required autocomplete="current-password">
                    <label for="password">Contraseña</label>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                  </div>

                  <div class="custom-control custom-checkbox mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">Recordar sesión</label>
                  </div>

                  <!-- <div class="form-group">                   
                    <div class="g-recaptcha" data-sitekey="6LcNsZAaAAAAADOw7uB3Dub7nHSm17bCIlQ2S30h"></div>                     
                  </div>                  

                  @error('g-recaptcha-response')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror               -->

                  <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2 rounded-pill" type="submit">Ingresar</button>

                  <!-- @if (Route::has('password.request'))
                    <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                        {{ __('¿Olvido su contraseña?') }}
                    </a>
                  @endif   -->

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>    
  

    </div>

  </body>
  </html>