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
                                    <i class="fa fa-image fa-5x"></i>
                                    {{--<img class="rounded w-50" src="https://avatars3.githubusercontent.com/u/22840027?s=460&v=4" alt="">--}}
                                </div>
                                <div class="text-center">
                                    <span class="w-100 font-weight-bold">{{auth()->user()->name}}</span><br>
                                    <span class="text-center w-100">( {{auth()->user()->email}} )</span>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="fa fa-calendar-plus-o fa-fw"></i>@lang('nav.courses')</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-gift fa-fw"></i>@lang('nav.promotions')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('logout')}}">@lang('nav.logout')</a>
                        </div>
                    </li>
                @endauth
                @guest
                <li class="mx-1 my-auto text-muted"></li>
                <li class="nav-item mt-0 mt-3 mt-lg-0">
                    <div class="btn-group w-100" role="group">
                        <a class="nav-link btn btn-outline-secondary btn-sm w-100" href="{{route('get.login')}}"><i class="fa fa-user-o fa-fw"></i>@lang('nav.login')</a>
                        <a class="nav-link btn btn-outline-secondary btn-sm w-100" href="{{route('get.register')}}"><i class="fa fa-user-plus fa-fw"></i>@lang('nav.register')</a>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

{{--Login--}}
@if(session()->has('logged_id'))
    @include('layouts.nav.nav-auth')
@endif

{{--Suscripcion--}}
@if(session()->has('mail_send'))
    @include('layouts.nav.nav-mail-send')
@endif

{{--Error mail--}}
@if($errors->any())
    @if($errors->first('mail_failed'))
        @include('layouts.nav.nav-mail-error')
    @endif
@endif