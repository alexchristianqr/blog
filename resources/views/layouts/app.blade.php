<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>acqrdeveloper | {{isset($myTitle) ? $myTitle : ''}}</title>
    @env('local')
    <link rel="stylesheet" href="{{asset('node_modules/bootstrap/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('node_modules/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/modern-business.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    @elseenv('prod')
    <link rel="stylesheet" href="{{asset("dist/css/main.css")}}">
    @endenv
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
@env('local')
<script src="{{ asset('node_modules/jquery/dist/jquery.js') }}"></script>
<script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.bundle.js') }}"></script>
@elseenv('prod')
<script src="{{ asset('dist/js/main.js') }}"></script>
@endenv
<script src="{{ asset('dist/js/app.js') }}"></script>

<script>
    window.localStorage.setItem('hostname','{{config('app')['url']}}')
</script>
</body>
</html>