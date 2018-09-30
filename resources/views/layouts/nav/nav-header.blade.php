<nav class="navbar navbar-expand-lg navbar-dark fixed-top nav-bg-default">
    <div class="container">
        <a class="navbar-brand" href="{{route('route.home')}}">
            <strong class="mr-1">Alex Christian</strong><span class="text-muted small">(developer)</span>
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="outline: none !important;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="{{ request()->routeIs('route.about') ? 'nav-item active font-weight-bold' : 'nav-item' }}">
                    <a class="nav-link {{request()->url() == route('route.about') ? 'text-white' : ''}}" href="{{route('route.about')}}"><i class="fa fa-info-circle fa-fw"></i>@lang('nav.about')</a>
                </li>
                <li class="mx-1 my-auto text-muted d-none d-lg-block">|</li>
                <li class="{{ request()->routeIs('route.contact') ? 'nav-item active font-weight-bold' : 'nav-item' }}">
                    <a class="nav-link" href="{{route('route.contact')}}"><i class="fa fa-map-marker fa-fw"></i>@lang('nav.contact')</a>
                </li>
                <li class="mx-1 my-auto text-muted d-none d-lg-block">|</li>
                <li class="{{ request()->routeIs('route.portfolio') || request()->routeIs('route.portfolio.item') ? 'nav-item active font-weight-bold' : 'nav-item' }}">
                    <a class="nav-link" href="{{route('route.portfolio')}}"><i class="fa fa-address-book fa-fw"></i>@lang('nav.portfolio')</a>
                </li>
                <li class="mx-1 my-auto text-muted d-none d-lg-block">|</li>
                <li class="{{ request()->routeIs('route.blog') || request()->routeIs('route.blog.post') || request()->routeIs('route.blog.search') || request()->routeIs('route.blog.post.search') || request()->routeIs('route.blog.category') ? 'nav-item active font-weight-bold' : 'nav-item' }}">
                    <a class="nav-link" href="{{route('route.blog')}}"><i class="fa fa-book fa-fw"></i>@lang('nav.blog')</a>
                </li>
                @auth()
                <li class="mx-1 my-auto text-muted d-none d-lg-block">|</li>
                <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="x1" data-toggle="dropdown">
                            <i class="fa fa-user-circle fa-fw"></i>
                            <span>@lang('nav.account')</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mb-2" aria-labelledby="x1">
                            <div class="dropdown-header">
                                <div class="text-center mb-2">
                                    {{--<i class="fa fa-picture-o fa-5x"></i>--}}
                                    @if(auth()->user()->provider_avatar != '')
                                    <img class="rounded w-50" src="{{auth()->user()->provider_avatar}}" alt="">
                                        @else
                                    <img class="rounded w-50" src="{{auth()->user()->image}}" alt="">
                                    @endif
                                </div>
                                <div class="text-center">
                                    <span class="w-100 font-weight-bold">{{auth()->user()->name}}</span><br>
                                    <span class="text-center w-100">( {{auth()->user()->email}} )</span>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="fa fa-archive mr-1"></i>@lang('nav.courses')</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-cubes mr-1"></i>@lang('nav.promotions')</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-star mr-1"></i>News</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('logout')}}"><i class="fa fa-sign-out mr-1"></i>@lang('nav.logout')</a>
                        </div>
                    </li>
                @endauth
                @guest
                <li class="mx-1 my-auto text-muted"></li>
                <li class="nav-item mt-0 mt-3 mt-lg-0">
                    <div class="btn-group w-100" role="group">
                        <a class="nav-link btn btn-outline-secondary btn-sm w-100 {{request()->routeIs('get.login') ? 'active' : ''}}" href="{{route('get.login')}}"><i class="fa fa-user fa-fw"></i>Log In</a>
                        <a class="nav-link btn btn-outline-secondary btn-sm w-100 {{request()->routeIs('get.register') ? 'active' : ''}}" href="{{route('get.register')}}"><i class="fa fa-user-plus fa-fw"></i>Sign Up</a>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

{{--Mode Beta--}}
@if(env('LEVEL') === 'beta')
@include('layouts.nav.nav-beta')
@endif

{{--Login--}}
@if(session()->has('message_auth'))
    @include('layouts.nav.nav-auth')
@endif

{{--Suscripcion--}}
@if(session()->has('message_success'))
    @include('layouts.nav.nav-success-laravel')
@endif

{{--Error mail--}}
@if($errors->any())
    @if($errors->first('message_failed'))
        @include('layouts.nav.nav-error-laravel')
    @endif
@endif