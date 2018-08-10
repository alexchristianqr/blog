<nav class="navbar navbar-expand-lg navbar-dark fixed-top nav-bg-default">
    <div class="container">
        <a class="navbar-brand" href="{{route('route.home')}}">
            <strong class="mr-1">Alex Christian</strong><span class="text-muted small">developer</span>
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="outline: none !important;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @if(request()->path() == 'portfolio' || request()->path() == 'contact')
                <li class="nav-item mt-2 mt-lg-0">
                    {!! Form::open(['url'=>route('route.blog.search'),'method'=>'GET','class'=>'text-center mr-0 mr-lg-1 ','autocomplete'=>'off']) !!}
                        <input-search-layout :data-props="{param_request:'{{request('param_search')}}'}" :data-color-first="{color: 'btn-dark'}" :data-color-sec="{color: 'btn-secondary'}"></input-search-layout>
                    {!! Form::close() !!}
                </li>
                @endif
                {{-- <li hidden class="{{ request()->url() == route('route.about') ? 'nav-item active font-weight-bold' : 'nav-item' }}">
                    <a class="nav-link {{request()->url() == route('route.about') ? 'text-primary' : ''}}" href="{{route('route.about')}}"><i class="fa fa-exclamation-circle fa-fw"></i>@lang('pages.about')</a>
                </li>
                <li hidden id="lineSeparate" class="mx-1 my-auto text-muted">|</li>
                <li hidden class="{{ request()->url() == route('route.service') ? 'nav-item active font-weight-bold' : 'nav-item' }}">
                    <a class="nav-link {{request()->url() == route('route.service') ? 'text-primary' : ''}}" href="{{route('route.service')}}"><i class="fa fa-tags fa-fw"></i>@lang('pages.service')</a>
                </li>
                <li hidden id="lineSeparate" class="mx-1 my-auto text-muted">|</li> --}}
                {{--<li id="lineSeparate" class="mx-1 my-auto text-muted">|</li>--}}
                <li class="{{ request()->url() == route('route.contact') ? 'nav-item active font-weight-bold' : 'nav-item' }}">
                    <a class="nav-link {{request()->url() == route('route.contact') ? 'text-primary' : ''}}" href="{{route('route.contact')}}"><i class="fa fa-phone fa-fw"></i>@lang('pages.contact')</a>
                </li>
                <li id="lineSeparate" class="mx-1 my-auto text-muted">|</li>
                <li class="{{ request()->url() == route('route.portfolio') ? 'nav-item active font-weight-bold' : 'nav-item' }}">
                    <a class="nav-link {{request()->url() == route('route.portfolio') ? 'text-primary' : ''}}" href="{{route('route.portfolio')}}"><i class="fa fa-github fa-fw"></i>@lang('pages.portfolio')</a>
                </li>
                <li id="lineSeparate" class="mx-1 my-auto text-muted">|</li>
                <li class="{{ request()->url() == route('route.blog') ? 'nav-item active font-weight-bold' : 'nav-item' }}">
                    <a class="nav-link {{request()->url() == route('route.blog') ? 'text-primary' : ''}}" href="{{route('route.blog')}}"><i class="fa fa-slack fa-fw"></i>@lang('pages.blog')</a>
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