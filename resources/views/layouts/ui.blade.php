<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title></title>

    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description" content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset("assets/ui/images/icons/favicon.png")}}">

    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: { families: ['Poppins:400,500,600,700'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = '{{asset("assets/ui/js/webfont.js")}}';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="preload" href="{{asset("assets/ui/vendor/fontawesome-free/webfonts/fa-regular-400.woff2")}}" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{asset("assets/ui/vendor/fontawesome-free/webfonts/fa-solid-900.woff2")}}" as="font" type="font/woff2"
        crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/ui/vendor/fontawesome-free/css/all.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/ui/vendor/animate/animate.min.css")}}">

    <!-- preloading link
    <link rel="preload" href="assets/fonts/venedor.woff" as="font" type="font/woff" crossorigin="anonymous"> -->

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset("assets/ui/vendor/swiper/swiper-bundle.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/ui/vendor/animate/animate.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/ui/vendor/magnific-popup/magnific-popup.min.css")}}">

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/ui/css/style.min.css")}}">

</head>

<body>
<div class="page-wrapper">
    <header class="header header-border">
    @include('includes.headbar')
    </header>
    <main class="main">
    @yield('content')
    </main>
</div>

<script src="{{asset("assets/ui/vendor/jquery/jquery.min.js")}}"></script>
    <script src="{{asset("assets/ui/vendor/jquery.plugin/jquery.plugin.min.js")}}"></script>
    <script src="{{asset("assets/ui/vendor/sticky/sticky.min.js")}}"></script>
    <script src="{{asset("assets/ui/vendor/imagesloaded/imagesloaded.pkgd.min.js")}}"></script>
    <script src="{{asset("assets/ui/vendor/jquery.countdown/jquery.countdown.min.js")}}"></script>
    <script src="{{asset("assets/ui/vendor/swiper/swiper-bundle.min.js")}}"></script>
    <script src="{{asset("assets/ui/vendor/magnific-popup/jquery.magnific-popup.min.js")}}"></script>

    <!-- Main JS -->
    <script src="{{asset("assets/ui/js/main.min.js")}}"></script>