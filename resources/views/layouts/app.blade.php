<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{ !isset($title) ? '@AlexChristian' :'@AlexChristian : '.$title }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Expires" content="-1" >
    @yield('content-metas-share')
    @env('local')
    <link rel="stylesheet" href="{{asset('node_modules/bootstrap/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('node_modules/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('node_modules/social-share-kit/dist/css/social-share-kit.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}"><!-- file develop -->
    @elseenv('prod')
    <link rel="stylesheet" href="{{asset("dist/css/main.css").'?cache'.str_limit(time(),6,'')}}">
    @endenv
</head>
<body>
<div id="app">
@if(request()->routeIs('route.blog.post'))
    <!-- Social Share Kit -->
        <social-share-kit-layout></social-share-kit-layout>
@endif

<!-- Navigation -->
@include('layouts.nav')

<!-- Page Content -->
@yield('content')
<!-- /.container -->

    <!-- Footer -->
    @include('layouts.footer')
</div>
@env('local')
<script src="{{asset('node_modules/jquery/dist/jquery.js')}}"></script>
<script src="{{asset('node_modules/bootstrap/dist/js/bootstrap.bundle.js')}}"></script>
@elseenv('prod')
<script src="{{asset('dist/js/main.js').'?cache'.str_limit(time(),6,'')}}"></script>
@endenv
<script src="{{asset('dist/js/app.js').'?cache'.str_limit(time(),6,'')}}"></script>

<script>
    window.localStorage.setItem('hostname','{{config('app')['url']}}')
</script>
</body>
</html>