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


  <link id="pagestyle" href="{{asset("assets/web/css/soft-design-system.css?v=1.0.9")}}" rel="stylesheet" />


</head>
<body class="blog-author bg-gray-100">
    <!-- Navbar -->
  @yield('content')
</div>

<script src="{{asset("assets/web/js/core/popper.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/web/js/core/bootstrap.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/web/js/plugins/perfect-scrollbar.min.js")}}"></script>




<!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
<script src="{{asset("assets/web/js/plugins/countup.min.js")}}"></script>





<script src="{{asset("assets/web/js/plugins/choices.min.js")}}"></script>





<script src="{{asset("assets/web/js/plugins/prism.min.js")}}"></script>
<script src="{{asset("assets/web/js/plugins/highlight.min.js")}}"></script>





<!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
<script src="{{asset("assets/web/js/plugins/rellax.min.js")}}"></script>
<!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
<script src="{{asset("assets/web/js/plugins/tilt.min.js")}}"></script>
<!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
<script src="{{asset("assets/web/js/plugins/choices.min.js")}}"></script>



</body>

</html>