<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> ALP Learning</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/customBell.css') }}" rel="stylesheet">
     
</head>
<body class="bg-gradient-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-8 col-md-8 col-xs-6">
        <div class="card o-hidden border-0 shadow my-5">
          <div class="card-header   d-flex justify-content-between align-items-center">
            <h5  style="color:#4e73df">{{ __('Crea una cuenta') }}</h5>
            <img src="{{ asset('img/logo.png') }}" height="60px" >
          </div>
            <div class="card-body">
              <form class="user" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row g-3">
                  <div class="col-md-6 col-xs-12 mt-3">
                    <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" placeholder="Nombre"
                    name="name" value="{{ old('name') }}" required  autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="col-md-6 col-xs-12 mt-3">
                    <input type="text" class="form-control form-control-user" id="lastname" placeholder="Apellido"
                    name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                  </div>
                </div>
                <div class="row g-3">
                  <div class="col-md-12 mt-3">
                    <input type="text" class="form-control form-control-user" id="username" placeholder="Nombre de usuario"
                    name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                  </div>
                </div>
                <div class="row g-3">
                  <div class="col-md-12 mt-3">
                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" 
                    placeholder="Correo electónico" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="row g-3">
                  <div class="col-md-6 col-xs-12 mt-3">
                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" 
                    name="password" value="{{ old('password') }}" required autocomplete="password" placeholder="Contraseña">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="col-md-6 col-xs-12 mt-3">
                    <input type="password"  class="form-control form-control-user" id="password-confirm" placeholder="Repetir contraseña"
                    name="password_confirmation" required autocomplete="new-password">
                  </div>
                </div>                   
                <button type="submit" class="btn btn-primary btn-user btn-block mt-4">Crear cuenta</button>
              </form>
            </div>
          </div>
        </div>
      </div>    
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
</body>