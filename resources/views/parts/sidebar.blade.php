    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item">
            <a class="nav-link" href="/" role="button">
              <i class="fas fa-home"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 <i class="fas fa-sign-out-alt"></i>

</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/home" class="brand-link">
      <img src="/assets/img/logo.png" alt="DTV Logo" class="brand-image"" style="opacity: .8">
      <span class="brand-text font-weight-light">DTV</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img @if(isset(Auth::user()->img_path)) src="/storage/{{ Auth::user()->img_path }}" @else src="/images/default.jpg" @endif alt="Profielfoto">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
            <li class="nav-header">MAIN</li>
              <li class="nav-item">
                <a href="/admin/home" class="nav-link {{ (request()->is('admin/home')) ? 'active' : '' }}">
                  <i class="fa fa-home nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
              <li class="nav-header">MANAGE</li>
              <li class="nav-item">
                <a href="/admin/users" class="nav-link  {{ (request()->is('admin/users')) ? 'active' : '' }}">
                    <i class="fas fa-user nav-icon"></i>
                  <p>Gebruikers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/court" class="nav-link  {{ (request()->is('admin/court')) ? 'active' : '' }}">
                    <i class="fas fa-flag nav-icon"></i>
                    <p>Banen</p>
                </a>
              </li>
              <li class="nav-item {{ (request()->is('admin/tournament/list') ||  request()->is('admin/tournament/registered')) ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                  <i class="fa fa-trophy nav-icon"></i>
                  <p>Tournamenten
                  <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/tournament/registered" class="nav-link {{ (request()->is('admin/tournament/registered')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tournament Registraties</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/tournament/list" class="nav-link  {{ (request()->is('admin/tournament/list')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Alle Tournamenten</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="/admin/reservations" class="nav-link  {{ (request()->is('admin/reservations')) ? 'active' : '' }}">
                  <i class="fa fa-calendar-check nav-icon"></i>
                  <p>Reservaties</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/menu" class="nav-link  {{ (request()->is('admin/menu')) ? 'active' : '' }}">
                <i class="fas fa-utensils nav-icon"></i>
                  <p>Menu</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
