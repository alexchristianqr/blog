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
                    <a class="nav-link {{request()->url() == route('route.about') ? 'text-white' : ''}}" href="{{route('route.about')}}"><i class="fa fa-info-circle fa-fw"></i>@lang('pages.about')</a>
                </li>
                <li id="lineSeparate" class="mx-1 my-auto text-muted">|</li>
                <li class="nav-item">
                    <a href="#" class="nav-link"><i class="fa fa-server fa-fw"></i>@lang('pages.service')</a>
                </li>
                <li id="lineSeparate" class="mx-1 my-auto text-muted">|</li>
                <li class="{{ request()->routeIs('route.contact') ? 'nav-item active font-weight-bold' : 'nav-item' }}">
                    <a class="nav-link" href="{{route('route.contact')}}"><i class="fa fa-phone-square fa-fw"></i>@lang('pages.contact')</a>
                </li>
                <li id="lineSeparate" class="mx-1 my-auto text-muted">|</li>
                <li class="{{ request()->routeIs('route.portfolio') || request()->routeIs('route.portfolio.item') ? 'nav-item active font-weight-bold' : 'nav-item' }}">
                    <a class="nav-link" href="{{route('route.portfolio')}}"><i class="fa fa-address-book fa-fw"></i>@lang('pages.portfolio')</a>
                </li>
                <li id="lineSeparate" class="mx-1 my-auto text-muted">|</li>
                <li class="{{ request()->routeIs('route.blog') || request()->routeIs('route.blog.post') || request()->routeIs('route.blog.search') || request()->routeIs('route.blog.post.search') || request()->routeIs('route.blog.category') ? 'nav-item active font-weight-bold' : 'nav-item' }}">
                    <a class="nav-link" href="{{route('route.blog')}}"><i class="fa fa-book fa-fw"></i>@lang('pages.blog')</a>
                </li>
                @if(session()->has('dataAuth'))
                <li id="lineSeparate" class="mx-1 my-auto text-muted">|</li>
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-o"></i></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                            <div class="dropdown-header">
                                <div class="text-left mb-2">
                                    <img class="rounded w-50" src="https://avatars3.githubusercontent.com/u/22840027?s=460&v=4" alt="">
                                </div>
                                <b>{{session('dataAuth')->name}}</b><br>
                                <span>({{session('dataAuth')->email}})</span>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                        </div>
                    </li>
                @else
                <li id="lineSeparate" class="mx-1 my-auto text-muted"></li>
                <li class="nav-item">
                    <div class="btn-group w-100" role="group">
                        <a class="nav-link btn btn-outline-secondary btn-sm w-100" data-toggle="modal" data-target="#modalLogin" href="#login"><i class="fa fa-user-o fa-fw"></i>Login</a>
                        <a class="nav-link btn btn-outline-secondary btn-sm w-100" data-toggle="modal" data-target="#modalRegister" href="#register"><i class="fa fa-user-plus fa-fw"></i>Register</a>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<login-modal data-token="{{csrf_token()}}"></login-modal>
<register-modal data-token="{{csrf_token()}}"></register-modal>

@if(session()->has('dataAuth'))
    @include('layouts.nav_auth')
@endif