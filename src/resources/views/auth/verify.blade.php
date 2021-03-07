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
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header  d-flex justify-content-between align-items-center ">
                        <h5  style="color:#4e73df">{{ __('Verifica tu correo electrónico') }}</h5>
                        <img src="{{ asset('img/logo.png') }}" height="60px" >
                    </div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Se ha enviado un nuevo enlace de verificación a su correo electrónico.') }}
                            </div>
                        @endif

                        {{ __('Antes de iniciar sesión, por favor revise su correo electrónico para verificar su cuenta.') }}
                        {{ __('Si no recibiste este email') }}, <a href="{{ route('verification.resend') }}">{{ __('click aquí') }}</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
