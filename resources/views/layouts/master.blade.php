<!doctype html>
<html lang="{{ app()->getLocale() }}">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.laravel = {csrfToken:'{{ csrf_token() }}'}</script>
    <link rel="apple-touch-icon" href="{{ url('template') }}/images/favicon.png">
    <link rel="shortcut icon" href="{{ url('template') }}/images/favicon.png"> 

    <link rel="stylesheet" href="{{ url('template') }}/assets/css/normalize.css">
    <link rel="stylesheet" href="{{ url('template') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('template') }}/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('template') }}/assets/css/themify-icons.css">
    <link rel="stylesheet" href="{{ url('template') }}/assets/css/pe-icon-7-filled.css">
    <link rel="stylesheet" href="{{ url('template') }}/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ url('template') }}/assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="{{ url('template') }}/assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    <div id="app" class="app">
    <!-- Left Panel -->
        @include('layouts.sidebar')
    <!-- /#left-panel -->
        <div id="right-panel" class="right-panel">

            <!-- Header-->
            <header id="header" class="header">  
                <div class="top-left">
                    <div class="navbar-header"> 
                        <a class="navbar-brand" href="./"><img src="{{ url('template') }}/images/logo.png" alt="Logo"></a>
                        <a class="navbar-brand hidden" href="./"><img src="{{ url('template') }}/images/logo2.png" alt="Logo"></a> 
                        <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a> 
                    </div> 
                </div>
                <div class="top-right"> 
                    <div class="header-menu"> 
                        <div class="header-left">
                        <div class="user-area dropdown float-right">
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="user-avatar rounded-circle" src="{{ url('template') }}/images/admin.jpg" alt="User Avatar">
                            </a>

                            <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="#"><i class="fa fa-user"></i>My Profile</a>
                                <a class="nav-link" href="#" onclick="document.getElementById('logout').submit()"><i class="fa fa-power-off"></i>Logout</a>
                                <form action="{{ url('logout') }}" method="post" id="logout" style="display: none;">{{ csrf_field() }}</form>
                            </div>
                        </div> 
                    </div>  
                </div>
            </header>
            <!-- Header-->
            
            <router-view></router-view>
            <div class="clearfix"></div>
            <footer class="site-footer">
                <div class="footer-inner bg-white">
                    <div class="row">
                        <div class="col-sm-6">
                            Copyright &copy; 2018 Ela Admin
                        </div>
                        <div class="col-sm-6 text-right">
                            Designed by <a href="https://colorlib.com">Colorlib</a>
                        </div>
                    </div>
                </div>
            </footer>
        
        </div><!-- /#right-panel -->
    </div> 


<script src="{{ url('template') }}/assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="{{ url('template') }}/assets/js/popper.min.js"></script>
<script src="{{ url('template') }}/assets/js/plugins.js"></script>
<script src="{{ url('template') }}/assets/js/main.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>
