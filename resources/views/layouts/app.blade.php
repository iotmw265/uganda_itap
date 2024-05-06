<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <title>SimbaNet Monitoring System - @yield('title') </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />

</head>
<body style='background-color:#fffff !important;'>
    <div id="app">
 <!-- Wrapper-->
    <div id="wrapper">


        <!-- Navigation -->
        @include('layouts.nav')

        <!-- Page wraper -->
        <div id="page-wrapper" style="background-color:#f0f0f0 !important;" >

            <!-- Page wrapper -->
            @include('layouts.topnav')

<div class="row wrapper border-bottom  page-heading" style="background-color:#1E73BE !important;">
    <!--div class="col-lg-3 ">
    </div-->
    <div class="col-lg-12" style='background-color: #1E73BE'>
            <!--a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a-->
        <h1 style="color: #ffffff !important; text-align: center; "><strong>Infrastructure Management System</strong> </h1>
    </div>
    <!--div class="col-lg-3 ">
    </div-->
</div>

            <!-- Main view  -->
            @yield('content')

            <!-- Footer -->
            <!-- @include('layouts.footer') -->

        </div>
        <!-- End page wrapper-->

    </div>
    </div>
</body>
</html>
