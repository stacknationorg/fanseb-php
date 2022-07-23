<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{config("app.name")}} | @yield("title")</title>

        <!-- Google font-->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Font Awesome-->
        <link rel="stylesheet" type="text/css" href="{{asset("assets/new/assets/css/fontawesome.css")}}">
        <!-- ico-font-->
        <link rel="stylesheet" type="text/css" href="{{asset("assets/new/assets/css/icofont.css")}}">
        <!-- Themify icon-->
        <link rel="stylesheet" type="text/css" href="{{asset("assets/new/assets/css/themify.css")}}">
        <!-- Feather icon-->
        <link rel="stylesheet" type="text/css" href="{{asset("assets/new/assets/css/feather-icon.css")}}">
        <link rel="stylesheet" type="text/css" href="{{asset("assets/new/assets/css/animate.css")}}">
        <!-- Plugins css start-->
        <link rel="stylesheet" type="text/css" href="{{asset("assets/new/assets/css/chartist.css")}}">
        <link rel="stylesheet" type="text/css" href="{{asset("assets/new/assets/css/date-picker.css")}}">
        <link rel="stylesheet" type="text/css" href="{{asset("assets/new/assets/css/prism.css")}}">
        <link rel="stylesheet" type="text/css" href="{{asset("assets/new/assets/css/pe7-icon.css")}}">
        <!-- Plugins css Ends-->
        <!-- Bootstrap css-->
        <link rel="stylesheet" type="text/css" href="{{asset("assets/new/assets/css/bootstrap.css")}}">
        <!-- App css-->
        <link rel="stylesheet" type="text/css" href="{{asset("assets/new/assets/css/style.css")}}">
        <link id="color" rel="stylesheet" href="{{asset("assets/new/assets/css/color-1.css")}}" media="screen">
        <!-- Responsive css-->
        <link rel="stylesheet" type="text/css" href="{{asset("assets/new/assets/css/responsive.css")}}">
        <link rel="stylesheet" type="text/css" href="{{asset("assets/main/css/material-icons.css")}}">
        <link type="text/css" href="{{asset("assets/toastr/toastr.min.css")}}" rel="stylesheet" />
        <link type="text/css" rel="stylesheet" href="{{asset("assets/main/css/toastr.css")}}"/>
        <style>  
            .ck-editor__editable {height: 150px;}
        </style>

        @yield('head')
    </head>

    <body>
        <!-- Loader starts-->
        <div class="loader-wrapper">
          <div class="typewriter">
            <h1>Loading..</h1>
          </div>
        </div>

        <!-- Drawer Layout -->
        <div class="page-wrapper">
            @include('includes.auth-header')
            <div class="page-body-wrapper">
                @if(Auth::user()->role==="Admin")
                    @include('includes.admin-sidebar')
                @endif
                @if(Auth::user()->role==="Instructor")
                    @include('includes.instructor-sidebar')
                @endif
                @if(Auth::user()->role==="Mentee")
                    @include('includes.mentee-sidebar')
                @endif
                @if(Auth::user()->role==="Manager")
                    @include('includes.manager-sidebar')
                @endif
                @if(Auth::user()->role==="Organisation")
                    @include('includes.org-sidebar')
                @endif
                @if(Auth::user()->role==="Institution")
                    @include('includes.inst-sidebar')
                @endif
                <div class="page-body">
                    @yield('content')
                </div>
            </div>
            @include('includes.footer')
        </div>
        @yield("modals")
        <!-- // END Drawer Layout -->
	
	<!-- Vendor JS -->
        <!-- jQuery -->
    <script src="{{asset("assets/new/assets/js/jquery-3.5.1.min.js")}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset("assets/new/assets/js/bootstrap/popper.min.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/bootstrap/bootstrap.js")}}"></script>
    <!-- feather icon js-->
    <script src="{{asset("assets/new/assets/js/icons/feather-icon/feather.min.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/icons/feather-icon/feather-icon.js")}}"></script>
    <!-- Sidebar jquery-->
    <script src="{{asset("assets/new/assets/js/sidebar-menu.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/config.js")}}"></script>
    <!-- Plugins JS start-->
    <script src="{{asset("assets/new/assets/js/typeahead/handlebars.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/typeahead/typeahead.bundle.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/typeahead/typeahead.custom.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/typeahead-search/handlebars.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/typeahead-search/typeahead-custom.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/chart/chartist/chartist.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/chart/chartist/chartist-plugin-tooltip.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/chart/apex-chart/apex-chart.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/chart/apex-chart/stock-prices.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/prism/prism.min.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/clipboard/clipboard.min.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/counter/jquery.waypoints.min.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/counter/jquery.counterup.min.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/counter/counter-custom.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/custom-card/custom-card.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/notify/bootstrap-notify.min.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/dashboard/default.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/notify/index.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/datepicker/date-picker/datepicker.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/datepicker/date-picker/datepicker.en.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/datepicker/date-picker/datepicker.custom.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/chat-menu.js")}}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset("assets/new/assets/js/script.js")}}"></script>
    <script src="{{asset("assets/new/assets/js/theme-customizer/customizer.js")}}"></script>
        <script src="{{asset("assets/toastr/toastr.min.js")}}"></script>
        <script src="{{asset("assets/main/js/toastr.js")}}"></script>
        {{--toastr--}}
        <script>
            @if(Session()->has('success'))
                toastr.success("{{Session('success')}}")
            @endif
            @if(Session()->has('warning'))
                toastr.warning("{{Session('warning')}}")
            @endif
            @if(Session()->has('error'))
                toastr.error("{{Session('error')}}")
            @endif
            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                    toastr.error("{{$error}}")
                @endforeach
            @endif
        </script>
        @yield("scripts")

    </body>

</html>