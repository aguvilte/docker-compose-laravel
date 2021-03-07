<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home')}}">
    <div class="navbar-brand">
        <img src="{{ asset('img/logo.png') }}" height="65px" >
    </div>
    <div class="sidebar-brand-text">ALP Learning</div>
  </a>
<!-- Divider -->
  <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
 <!-- Heading -->
  <div class="sidebar-heading">Interface</div>
  
  <li class="nav-item">
    <a class="nav-link" href="{{ route('indexPatente') }}">
      <i class="fas  fa-car" style="color: withe;;" title="Patentes"></i>
      <span>Patentes</span>
    </a>
  </li>      
  
  <li class="nav-item">
    <a class="nav-link" href="{{ route('indexNotificaciones') }}">
      <i class="fas fa-bell fa-fw" style="color: withe;;" title="Personas robadas"></i>
      <span>Notificaciones</span>
    </a>
  </li>
        
  <li class="nav-item">
    <a class="nav-link" href="{{ route('denuncias.index') }}">
      <i class="fas fa-user-friends" style="color: withe;;" title="Personas robadas"></i>
      <span>Denuncias</span>
    </a>
  </li>
        

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->