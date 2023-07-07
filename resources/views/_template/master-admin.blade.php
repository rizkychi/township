<!-- =========================================================
* Argon Dashboard PRO v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright 2019 Creative Tim (https://www.creative-tim.com)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Jogmatis code for Skin, Decoratio, Coupon, and Others">
  <meta name="author" content="Jogmatis Code">
  <title>@yield('page_title') | Jogmatis Code</title>
  <!-- Favicon -->
  <!-- <link rel="icon" href="../../assets/img/brand/favicon.png" type="image/png"> -->
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <!-- <link rel="stylesheet" href="{{ asset('/src/fonts/nucleo/css/nucleo.css') }}" type="text/css"> -->
  <link rel="stylesheet" href="{{ asset('/src/fonts/fontawesome/all.min.css') }}" type="text/css">
  <!-- Page plugins -->
  <link rel="stylesheet" href="{{ asset('/src/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/src/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/src/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('/src/css/argon.min.css') }}" type="text/css">

  <style>
    td {
      max-width: 100px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }
  </style>
</head>

<body>
@include('sweetalert::alert')
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="{{ route('admin.home') }}">
          <img src="{{ asset('/src/img/logo.png') }}" class="navbar-brand-img" alt="Jogmatis Code">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          @php
            $home = $code = $tutorial = '';
            if (Route::is('admin.*'))
              $home = 'active';
            else if (Route::is('code.*'))
              $code = 'active';
            else if (Route::is('tutorial.*'))
              $tutorial = 'active';
          @endphp
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ $home }}" href="{{ route('admin.home') }}">
                <i class="fas fa-home text-primary"></i>
                <span class="nav-link-text">Home</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ $code }}" href="{{ route('code.show.index') }}">
                <i class="fas fa-code text-info"></i>
                <span class="nav-link-text">Code</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ $tutorial }}" href="{{ route('tutorial.show.index') }}">
                <i class="fas fa-file-alt text-red"></i>
                <span class="nav-link-text">Tutorial</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Title -->
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center">
            <li class="nav-item">
              <!-- Sidenav toggler -->
              <h6 class="h2 m-0 text-white">@yield('title')</h6>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{ asset('/src/img/team-1.jpg') }}">
                  </span>
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{ strtoupper(Auth::getUser()->username) }}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="fas fa-key"></i>
                  <span>Change Password</span>
                </a>
                <a href="{{ route('admin.logout') }}" class="dropdown-item">
                  <i class="fas fa-sign-out-alt"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              
            </div>
          </div>
          <!-- Card stats -->
          @yield('stats')
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      @yield('content')
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-6">
            <div class="copyright text-center text-muted">
              &copy; 2020 <a href="{{ route('home') }}" class="font-weight-bold ml-1" target="_blank">Jogmatis Code</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('/src/js/jquery.min.js') }}"></script>
  <script src="{{ asset('/src/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/src/js/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('/src/js/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('/src/js/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>

  <!-- Optional JS -->
  <script src="{{ asset('/src/js/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('/src/js/chart.js/dist/Chart.extension.js') }}"></script>

  <!-- Optional JS -->
  <script src="{{ asset('/src/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('/src/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('/src/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('/src/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('/src/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('/src/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('/src/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('/src/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>

  <!-- Argon JS -->
  <script src="{{ asset('/src/js/argon.min.js') }}"></script>

  @stack('scripts')

  <!-- Custom JS -->
  <script>
    $('.dtx').on( 'init.dt', function () {
			$('div.dataTables_length select').removeClass('custom-select custom-select-sm');
    });
  </script>
</body>

</html>