<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8">
    <title>congodrone service | Services LiDAR pour drones en RDC et solutions
        intelligentes pour drone | @yield('title')</title>

    <!-- Mobile Specific Metas
================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Site internet par Kim Engineering">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name=author content="Kim Engineering">
    <meta name=generator content="Site internet par Kim Engineering">

    <!-- Favicon
================================================== -->
    <link rel="icon" type="image/png" href="{{ asset('front-end/images/logoValid4.jpeg', env('REDIRECT_HTTPS')) }}">

    <!-- CSS
================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('front-end/plugins/bootstrap/bootstrap.min.css', env('REDIRECT_HTTPS')) }}">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('front-end/plugins/fontawesome/css/all.min.css', env('REDIRECT_HTTPS')) }}">
    <!-- Animation -->
    <link rel="stylesheet" href="{{ asset('front-end/plugins/animate-css/animate.css', env('REDIRECT_HTTPS')) }}">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="{{ asset('front-end/plugins/slick/slick.css', env('REDIRECT_HTTPS')) }}">
    <link rel="stylesheet" href="{{ asset('front-end/plugins/slick/slick-theme.css', env('REDIRECT_HTTPS')) }}">
    <!-- Colorbox -->
    <link rel="stylesheet" href="{{ asset('front-end/plugins/colorbox/colorbox.css', env('REDIRECT_HTTPS')) }}">
    <!-- Template styles-->
    <link rel="stylesheet" href="{{ asset('front-end/css/style.css', env('REDIRECT_HTTPS')) }}">

</head>

<body>
    <div class="body-inner">

        @yield('header')

        @yield('content')

        @yield('footer')

        <!-- Javascript Files
    ================================================== -->

        <!-- initialize jQuery Library -->
        <script src="{{ asset('front-end/plugins/jQuery/jquery.min.js', env('REDIRECT_HTTPS')) }}"></script>
        <!-- Bootstrap jQuery -->
        <script src="{{ asset('front-end/plugins/bootstrap/bootstrap.min.js', env('REDIRECT_HTTPS')) }}" defer></script>
        <!-- Slick Carousel -->
        <script src="{{ asset('front-end/plugins/slick/slick.min.js', env('REDIRECT_HTTPS')) }}"></script>
        <script src="{{ asset('front-end/plugins/slick/slick-animation.min.js', env('REDIRECT_HTTPS')) }}"></script>
        <!-- Color box -->
        <script src="{{ asset('front-end/plugins/colorbox/jquery.colorbox.js', env('REDIRECT_HTTPS')) }}"></script>
        <!-- shuffle -->
        <script src="{{ asset('front-end/plugins/shuffle/shuffle.min.js', env('REDIRECT_HTTPS')) }}" defer></script>


        <!-- Google Map API Key-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
        <!-- Google Map Plugin-->
        <script src="{{ asset('front-end/plugins/google-map/map.js', env('REDIRECT_HTTPS')) }}" defer></script>

        <!-- Template custom -->
        <script src="{{ asset('front-end/js/script.js', env('REDIRECT_HTTPS')) }}"></script>

    </div>
    <!-- Body inner end -->
</body>

</html>
