<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
        <div class="row justify-content-center py-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center ">
                        <h5 style="color:#4e73df">{{ __('Cambiar contraseña') }}</h5>
                        <img src="{{ asset('img/logo.png') }}" height="60px" >
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}" class="user">
                                @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group row ">
                                <div class="col-md-8" style="margin-right:auto; margin-left:auto;">
                                    <label for="email" class="col-md-8 col-form-label text-md-left">{{ __('Correo Electrónico') }}</label>
                                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8" style="margin-right:auto; margin-left:auto;">
                                    <label for="password" class="col-md-8 col-form-label text-md-left">{{ __('Contraseña') }}</label>
                                    <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8" style="margin-right:auto; margin-left:auto;">
                                    <label for="password-confirm" class="col-md-8 col-form-label text-md-left">{{ __('Confirmar contraseña') }}</label>
                                    <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row ">
                                <div class="col-md-8 offset-md-2 mt-3">
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        {{ __('Cambiar contraseña') }}
                                    </button>
                                </div>
                            </div>
                        </form>
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
