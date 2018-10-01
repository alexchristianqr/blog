<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <title>{{ !isset($title) ? 'Alex Christian (dvlopr) - Programador Full-Stack de Aplicaciones Web y Moviles Híbridos' : 'Alex Christian | '.$title }}</title>
    <meta charset="UTF-8">
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#343a40">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#343a40">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#343a40">
    <!-- Other Metas -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Expires" content="-1">
    @yield('content-metas-share')
    <link rel="icon" href="{{asset('favicon.png')}}">
    @env('local')
    <link rel="stylesheet" href="{{asset('node_modules/bootstrap/dist/css/bootstrap.css')}}"><!-- node_modules -->
    <link rel="stylesheet" href="{{asset('node_modules/font-awesome/css/font-awesome.css')}}"><!-- node_modules -->
    <link rel="stylesheet" href="{{asset('node_modules/social-share-kit/dist/css/social-share-kit.css')}}"><!-- node_modules -->
    <link rel="stylesheet" href="{{asset('assets/css/sticky-footer-navbar.css')}}"><!-- dev -->
    <link rel="stylesheet" href="{{asset('assets/css/modern-business.css')}}"><!-- dev -->
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}"><!-- dev -->
    @elseenv('prod')
    <link rel="stylesheet" href="{{asset("dist/css/main.css")}}"><!-- produccion -->
    @endenv
    @env('local')
    <script src="{{asset('dist/js/main.js')}}"></script><!-- local -->
    <script src="{{asset('node_modules/vue/dist/vue.js')}}"></script><!-- local -->
    @elseenv('prod')
    <script src="{{asset('dist/js/main.js').'?cache'.str_limit(time(),6,'')}}"></script><!-- produccion -->
    <script src="{{asset('dist/js/vue.min.js').'?cache'.str_limit(time(),6,'')}}"></script><!-- produccion -->
    @endenv
</head>
<body>
<div id="app">

    <!-- Social Share Kit -->
    @if(request()->routeIs('route.blog.post'))
        @include('includes.social-share-kit')
    @endif

    <!-- Fixed navbar -->
    <header>
        @include('layouts.nav.nav-header')
    </header>

    <!-- Page Content -->
    <main role="main" class="mb-5" style="padding-bottom: 5rem">
        @yield('content')
    </main>

    <!-- Fo oter -->
    <footer class="footer border-left-0 border-right-0 border-bottom-0 border-1 border-color-default">
        @include('layouts.footer')
    </footer>

    <!-- Build Scripts -->
    @yield('script-js')

</div>
</body>
</html>