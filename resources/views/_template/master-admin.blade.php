<!-- =========================================================
* Argon Dashboard PRO v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright 2019 Creative Tim (https://www.creative-tim.com)

* Anggotad by Creative Tim

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
  <!-- <link rel="stylesheet" href="{{ asset('/src/fonts/nucleo/css/nucleo.css') }}" type="text/css"> -->
  <link rel="stylesheet" href="{{ asset('/src/fonts/fontawesome/all.min.css') }}" type="text/css">
  <!-- Page plugins -->
  <link rel="stylesheet" href="{{ asset('/src/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/src/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/src/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('/src/css/argon.min.css') }}" type="text/css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('/src/css/custom.css') }}" type="text/css">
 
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
          <!-- <img src="{{ asset('/src/img/header_jogmatis.png') }}" class="navbar-brand-img" alt="Jogmatis Anggota"> -->
          Jogmatis
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
            $home = $anggota = '';
            if (Route::is('admin.*'))
              $home = 'active';
            else if (Route::is('admin.anggota.*'))
              $anggota = 'active';
          @endphp
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ $home }}" href="{{ route('admin.home') }}">
                <i class="fas fa-home text-primary"></i>
                <span class="nav-link-text">Home</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ $anggota }}" href="{{ route('admin.anggota.index') }}">
                <i class="fas fa-users text-info"></i>
                <span class="nav-link-text">Anggota</span>
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
    <nav class="navbar navbar-top navbar-expand navbar-dark border-bottom" style="background-color: gold;">
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
              <!-- <h6 class="h2 m-0 text-white">@yield('title')</h6> -->
              <img src="{{ asset('/src/img/header_jogmatis.png') }}" class="navbar-brand-img" alt="Jogmatis">
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
    <div class="header pb-6" style="background-color: gold;">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-2">
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
              &copy; 2023 <a href="{{ route('home') }}" class="font-weight-bold ml-1" target="_blank">Jogmatis</a>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/v/dt/jszip-3.10.1/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.js"></script>


  <!-- Argon JS -->
  <script src="{{ asset('/src/js/argon.min.js') }}"></script>

  <!-- Sweet Alert -->
  <script src="{{ asset('/vendor/sweetalert/sweetalert.all.js') }}"></script>
  <script src="{{ asset('/src/js/custom-alert.js') }}"></script>

  @stack('scripts')

  <!-- Custom JS -->
  <script>
    $('.dtx').on( 'init.dt', function () {
			$('div.dataTables_length select').removeClass('custom-select custom-select-sm');
    });

    function newexportaction(e, dt, button, config) {
         var self = this;
         var oldStart = dt.settings()[0]._iDisplayStart;
         dt.one('preXhr', function (e, s, data) {
             // Just this once, load all data from the server...
             data.start = 0;
             data.length = 2147483647;
             dt.one('preDraw', function (e, settings) {
                 // Call the original action function
                 if (button[0].className.indexOf('buttons-copy') >= 0) {
                     $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                 } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                     $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                         $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                         $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                 } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                     $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                         $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                         $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                 } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                     $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                         $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                         $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                 } else if (button[0].className.indexOf('buttons-print') >= 0) {
                     $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                 }
                 dt.one('preXhr', function (e, s, data) {
                     // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                     // Set the property to what it was before exporting.
                     settings._iDisplayStart = oldStart;
                     data.start = oldStart;
                 });
                 // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                 setTimeout(dt.ajax.reload, 0);
                 // Prevent rendering of the full data to the DOM
                 return false;
             });
         });
         // Requery the server with the new one-time export settings
         dt.ajax.reload();
     }
  </script>
</body>

</html>