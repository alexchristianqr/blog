<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta property="fb:app_id" content="481663735685291"/>
    <meta property="og:url"                 content="{{ request()->getUri() }}"/>
    <meta property="og:type"                content="article"/>
    <meta property="og:title"               content="When Great Minds Don’t Think Alike" />
    <meta property="og:description"         content="How much does culture influence creative thinking?" />
    <meta property="og:image"               content="http://static01.nyt.com/images/2015/02/19/arts/international/19iht-btnumbers19A/19iht-btnumbers19A-facebookJumbo-v2.jpg" />
    {{--<meta property="og:image" content="{{ asset('images/posts/750x300/01.jpg') }}"/>--}}
    <title>{{isset($myTitle) ? $myTitle : 'Blog'}} | acqrdeveloper.com</title>
    @env('local')
    <link rel="stylesheet" href="{{asset('node_modules/bootstrap/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('node_modules/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('node_modules/social-share-kit/dist/css/social-share-kit.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/modern-business.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    @elseenv('prod')
    <link rel="stylesheet" href="{{asset("dist/css/main.css")}}">
    @endenv
</head>
<body>
    <!-- Component -->
    @include('components.social-share-kit')
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