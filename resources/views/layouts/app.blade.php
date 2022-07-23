<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset("assets/fan/img/apple-icon.png")}}">
  <link rel="icon" type="image/png" href="{{asset("assets/fan/img/favicon.png")}}">
  <title>{{config("app.name")}} | @yield("title")</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{asset("assets/fan/css/nucleo-icons.css")}}" rel="stylesheet" />
  <link href="{{asset("assets/fan/css/nucleo-svg.css")}}" rel="stylesheet" />
  <link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"rel="stylesheet" type="text/css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{asset("assets/fan/css/nucleo-svg.css")}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset("assets/fan/css/argon-dashboard.css?v=2.0.4")}}" rel="stylesheet" />

</head>
<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
    <span class="mask bg-primary opacity-6"></span>
  </div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
  @include('includes.navbar')
  </aside>
  <div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
  @yield('content')
</div>
  <script src="{{asset("assets/fan/js/core/popper.min.js")}}"></script>
  <script src="{{asset("assets/fan/js/core/bootstrap.min.js")}}"></script>
  <script src="{{asset("assets/fan/js/plugins/perfect-scrollbar.min.js")}}"></script>
  <script src="{{asset("assets/fan/js/plugins/smooth-scrollbar.min.js")}}"></script>
  <script src="{{asset("assets/fan/js/plugins/chartjs.min.js")}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
	<script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"type="text/javascript"></script>
	  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset("assets/fan/js/argon-dashboard.min.js?v=2.0.4")}}"></script>
</body>

</html>