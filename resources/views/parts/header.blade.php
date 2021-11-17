<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span>DTV</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link  {{ (request()->is('/')) ? 'active' : '' }}" href="/">Home</a></li>
          @if (Auth::check())
          <li><a class="nav-link  {{ (request()->is('reserveren')) ? 'active' : '' }}" href="/reserveren">Baan reserveren</a></li>
          <li><a class="nav-link {{ (request()->is('toernooi')) || (request()->is('toernooien')) ? 'active' : '' }}" href="/toernooien">Toernooien</a></li>
          @endif
          <li><a class="nav-link {{ (request()->is('menu'))  ? 'active' : '' }}" href="/menu">Menu kaart</a></li>
          {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}

          @if (Auth::check())
            <li class="dropdown"><a href="#"><span><i class="lni lni-user"></i> Account</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/profile ">Profiel</a></li>
            <li><a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Uitloggen') }}

</a></li>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
            </ul>
          </li>
          @else
          <li><a class="nav-link" href="/login">Inloggen</a></li>
          <li><a class="getstarted" href="/register">Wordt lid</a></li>
          @endif

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
