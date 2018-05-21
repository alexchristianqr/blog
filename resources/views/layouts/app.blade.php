<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>acqrdeveloper | {{isset($myTitle)?$myTitle:''}}</title>

{{--<!-- Bootstrap core CSS -->--}}
{{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">--}}
{{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>--}}
<!-- Scripts -->
    @if(env('APP_ENV') == 'local')
        <link rel="stylesheet" href="{{asset('node_modules/bootstrap/dist/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('node_modules/font-awesome/css/font-awesome.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/modern-business.css')}}">
    @else
        <link rel="stylesheet" href="{{asset("dist/css/main.css")}}">
@endif

<!-- Custom styles for this template -->
    <style>
        @media (min-width: 1200px) {
            .container {
                max-width: 1000px !important;
            }
        }
    </style>
</head>
<body>
<!-- Navigation -->
@include('layouts.nav')

<!-- Page Content -->
@yield('content')
<!-- /.container -->

<!-- Footer -->
@include('layouts.footer')
@if(env('APP_ENV') == 'local')
    <script src="{{ asset('node_modules/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('dist/js/app.js') }}"></script>
@else
    <script src="{{ asset('dist/js/main.js') }}"></script>
@endif
</body>
</html>