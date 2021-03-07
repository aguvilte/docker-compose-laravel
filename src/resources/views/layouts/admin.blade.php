<html lang="es">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titulo')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/customBell.css') }}" rel="stylesheet">
     @auth()
      <script>
        var user = "{{ auth()->user()->id }}"
      </script>
     @endauth 
    @yield('head')
  </head>
  
  <body id="page-top">
    <div id="wrapper">
      @yield('wrapper')
      <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
          @yield('topbar')
          <!-- Begin Page Content -->
          <div class="container-fluid">
            @yield("content")
          </div>
          <!-- /.container-fluid -->
        </div>
        @yield('footer')
      </div>
    </div>
    
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
      @auth()
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/echoPrivate.js') }}"></script>
        <script src="{{ asset('enable-push.js') }}" defer></script>
      @endauth 
    @yield('javascript')
  </body>
</html>
