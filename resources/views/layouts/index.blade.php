<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>E LOGSHEET</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  @yield('css')

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" id="key_search" autocomplete="off" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">


          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a  class="dropdown-item has-icon text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">E Logsheet</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">EL</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item">
                <a href="{{ url('home') }}" class="nav-link"><i class="fas fa-fire"></i><span>PLTD</span></a>
                <a href="{{ url('home-ebt') }}" class="nav-link"><i class="fas fa-fire"></i><span>EBT</span></a>
              </li>
              <li class="menu-header">Pembangkit</li>


              <li><a class="nav-link" href="{{ url('pltd-amp') }}"><i class="fas fa-cogs"></i> <span>PLTD Ampenan</span></a></li>
              <li><a class="nav-link" href="{{ url('pltd-pm') }}"><i class="fas fa-cogs"></i> <span>PLTD Paok Motong</span></a></li>
              <li><a class="nav-link" href="{{ url('pltmh-narmada/log') }}"><i class="fas fa-cogs"></i> <span>PLTMH Narmada</span></a></li>
              <li><a class="nav-link" href="{{ url('pltmh-pengga/log') }}"><i class="fas fa-cogs"></i> <span>PLTMH Pengga</span></a></li>
              <li><a class="nav-link" href="{{ url('pltmh-santong/log') }}"><i class="fas fa-cogs"></i> <span>PLTMH Santong</span></a></li>
              <li><a class="nav-link" href="{{ url('plts/home') }}"><i class="fas fa-cogs"></i> <span>PLTS Gili Trawangan</span></a></li>
              <li><a class="nav-link" href="{{ url('plts-gm/home') }}"><i class="fas fa-cogs"></i> <span>PLTS Gili Meno</span></a></li>
              <li><a class="nav-link" href="{{ url('plts-ga/home') }}"><i class="fas fa-cogs"></i> <span>PLTS Gili Air</span></a></li>


              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i> <span>Master</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="features-activities.html">User</a></li>
                  <li><a class="nav-link" href="features-post-create.html">Post Create</a></li>
                  <li><a class="nav-link" href="features-posts.html">Posts</a></li>
                  <li><a class="nav-link" href="features-profile.html">Profile</a></li>
                  <li><a class="nav-link" href="features-settings.html">Settings</a></li>
                  <li><a class="nav-link" href="features-setting-detail.html">Setting Detail</a></li>
                  <li><a class="nav-link" href="features-tickets.html">Tickets</a></li>
                </ul>
              </li>
              
              {{-- <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li> --}}
            </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('section-header')</h1>
          </div>

          <div class="section-body">
              @yield('content')
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2022 <div class="bullet"></div> by <a href="https://nauval.in/">UPK LOMBOK</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>

  @yield('js')
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

  <!-- Page Specific JS File -->
</body>
</html>
