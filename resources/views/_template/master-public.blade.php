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
  <meta name="description" content="Jogmatis">
  <meta name="author" content="Jogmatis">
  <title>@yield('page_title') | Jogmatis</title>
  <!-- Favicon -->
  <!-- <link rel="icon" href="../../assets/img/brand/favicon.png" type="image/png"> -->
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <!-- <link rel="stylesheet" href="{{ asset('/src/fonts/nucleo/nucleo.css') }}" type="text/css"> -->
  <link rel="stylesheet" href="{{ asset('/src/fonts/fontawesome/all.min.css') }}" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('/src/css/argon.min.css') }}" type="text/css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('/src/css/custom.css') }}" type="text/css">
</head>

<body class="bg-default">
@include('sweetalert::alert')
  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">
        <!-- <img src="{{ asset('/src/img/header_jogmatis.png') }}"> -->
      </a>
      <button class="navbar-toggler d-none" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="{{ route('home') }}">
                <!-- <img src="{{ asset('/src/img/header_jogmatis.png') }}"> -->
                Jogmatis
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav mr-auto">
          <!-- <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
              <span class="nav-link-inner--text">Home</span>
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a href="../../pages/examples/pricing.html" class="nav-link">
              <span class="nav-link-inner--text">Explore Code</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../pages/examples/login.html" class="nav-link">
              <span class="nav-link-inner--text">Tutorial</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../pages/examples/register.html" class="nav-link">
              <span class="nav-link-inner--text">Input Code</span>
            </a>
          </li> -->
        </ul>
        <hr class="d-lg-none" />
        <!-- <ul class="navbar-nav align-items-lg-center ml-lg-auto">
          <li class="nav-item d-none d-lg-block ml-lg-4">
            <a href="https://www.creative-tim.com/product/argon-dashboard-pro" target="_blank" class="btn btn-neutral btn-icon">
              <span class="nav-link-inner--text">Support Me!</span>
            </a>
          </li>
        </ul> -->
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <!-- <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9"> -->
    <div class="header bg-gradient-primary py-5">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">@yield('title')</h1>
              <p class="text-lead text-white">@yield('sub_title')</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    @yield('content')
  </div>

  <!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-xl-6">
          <div class="copyright text-center text-muted">
            &copy; 2023 <a href="{{ route('home') }}" class="font-weight-bold ml-1" target="_blank">Jogmatis</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('/src/js/jquery.min.js') }}"></script>
  <script src="{{ asset('/src/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/src/js/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('/src/js/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('/src/js/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>

  <!-- Argon JS -->
  <script src="{{ asset('/src/js/argon.min.js') }}"></script>

</body>

</html>