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
<body class="bg-dark">
        @yield('content')
</body>