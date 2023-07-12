<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>congodrone service | Services LiDAR pour drones en RDC et solutions
    intelligentes pour drone | @yield('title')</title>
  <link rel="icon" type="image/png" href="{{ asset('front-end/images/logoValid4.jpeg', env('REDIRECT_HTTPS')) }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css', env('REDIRECT_HTTPS'))}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css', env('REDIRECT_HTTPS'))}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css', env('REDIRECT_HTTPS'))}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('backend/plugins/jqvmap/jqvmap.min.css', env('REDIRECT_HTTPS'))}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css', env('REDIRECT_HTTPS'))}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css', env('REDIRECT_HTTPS'))}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('backend/plugins/daterangepicker/daterangepicker.css', env('REDIRECT_HTTPS'))}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('backend/plugins/summernote/summernote-bs4.min.css', env('REDIRECT_HTTPS'))}}">
  @yield('style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  @include('include.admin_navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  {{--start left side bar--}}

  @include('include.leftsidebar')
  {{--end left side bar--}}

    {{--start content--}}
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@yield('title')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Accueil</a></li>
                            @yield('breadcrumb')
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        @yield('content')
    </div>
    <!-- /.content-wrapper -->
    {{--end content--}}
    {{--start footer--}}
@include('include.adminfooter')
    {{--end footer--}}

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('backend/plugins/jquery/jquery.min.js', env('REDIRECT_HTTPS'))}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('backend/plugins/jquery-ui/jquery-ui.min.js', env('REDIRECT_HTTPS'))}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script> -->
    <!-- Bootstrap 4 -->
    <script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js', env('REDIRECT_HTTPS'))}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('backend/plugins/chart.js/Chart.min.js', env('REDIRECT_HTTPS'))}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('backend/plugins/sparklines/sparkline.js', env('REDIRECT_HTTPS'))}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('backend/plugins/jqvmap/jquery.vmap.min.js', env('REDIRECT_HTTPS'))}}"></script>
    <script src="{{asset('backend/plugins/jqvmap/maps/jquery.vmap.usa.js', env('REDIRECT_HTTPS'))}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('backend/plugins/jquery-knob/jquery.knob.min.js', env('REDIRECT_HTTPS'))}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('backend/plugins/moment/moment.min.js', env('REDIRECT_HTTPS'))}}"></script>
    <script src="{{asset('backend/plugins/daterangepicker/daterangepicker.js', env('REDIRECT_HTTPS'))}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js', env('REDIRECT_HTTPS'))}}"></script>
    <!-- Summernote -->
    <script src="{{asset('backend/plugins/summernote/summernote-bs4.min.js', env('REDIRECT_HTTPS'))}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js', env('REDIRECT_HTTPS'))}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('backend/dist/js/adminlte.js', env('REDIRECT_HTTPS'))}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('backend/dist/js/pages/dashboard.js', env('REDIRECT_HTTPS'))}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('backend/dist/js/demo.js', env('REDIRECT_HTTPS'))}}"></script>
    @yield('scripts')
    </body>
    </html>
