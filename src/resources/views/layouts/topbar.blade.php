<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown no-arrow mx-1 ">
      <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <!-- Counter - Alerts -->
        @if (Auth()->user()->unreadNotifications->count() > 0)
          <span class="badge badge-danger badge-counter" id="spanIcon">
            {{ Auth()->user()->unreadNotifications->count()}}
          </span> 
        @endif
      </a>
      <!-- Dropdown - Alerts -->
      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in navbarIcon" aria-labelledby="alertsDropdown" id="notificaciones">
        <h6 class="dropdown-header" id="notificacionA">
         Alertas de detección 
        </h6>
      @foreach (Auth()->user()->unreadNotifications as $notification)
        <a class="dropdown-item d-flex align-items-center bg-gray-200"  href="{{ url("/notificaciones/show/{$notification->id}") }}">
          <div class="mr-3">
            <div class="icon-circle bg-warning">
              <i class="fas fa-exclamation-triangle text-white"></i>
            </div>
          </div>
          <div>
            <div class="small text-gray-500">{{ $notification->data['fecha'] }}</div>
            <span class="font-weight-bold">La patatente  {{ $notification->data['numero_patente']}} fue detectada por nuestras cámaras</span>
          </div>
        </a>
      @endforeach
       @foreach (Auth()->user()->readNotifications->take(5) as $notification)
        <a class="dropdown-item d-flex align-items-center" href="{{ url("/notificaciones/show/{$notification->id}") }}">
          <div class="mr-3">
            <div class="icon-circle bg-warning">
              <i class="fas fa-exclamation-triangle text-white"></i>
            </div>
          </div>
          <div>
            <div class="small text-gray-500">{{ $notification->data['fecha'] }}</div>
            <span class="font-weight-bold">La patatente  {{ $notification->data['numero_patente']}} fue detectada por nuestras cámaras</span>
          </div>
        </a>
      @endforeach
       <a class="dropdown-item text-center small text-gray-500" href="{{ route('indexNotificaciones') }}">Ver todas las alertas</a>
    </li>
    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
        <img class="img-profile rounded-circle" src="{{ URL::asset("img/Marce.jpg") }}">
      </a>

      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        
        <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            {{ __('Cerrar sesión') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

      </div>

    </li>

  </ul>

</nav>
<script>
  let cantidad = "{{Auth()->user()->unreadNotifications->count() }}"
</script>
<!-- End of Topbar -->