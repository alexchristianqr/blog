<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>acqrdeveloper | {{isset($myTitle) ? $myTitle : ''}}</title>
    <!--
        - Execute in console for changes in file .env
        > php artisan config:clear
    -->
    @if(env('APP_ENV') !== 'prod')
        <link rel="stylesheet" href="{{asset('node_modules/bootstrap/dist/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('node_modules/font-awesome/css/font-awesome.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/modern-business.css')}}">
    @else
        <link rel="stylesheet" href="{{asset("dist/css/main.css")}}">
    @endif

</head>
<body>
<div id="app">
    <!-- Navigation -->
@include('layouts.nav')

<!-- Page Content -->
@yield('content')
<!-- /.container -->

    <!-- Footer -->
    @include('layouts.footer')
</div>
@if(env('APP_ENV') !== 'prod')
    <script src="{{ asset('node_modules/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.bundle.js') }}"></script>
@else
    <script src="{{ asset('dist/js/main.js') }}"></script>
@endif
<script src="{{ asset('dist/js/app.js') }}"></script>
</body>
</html>