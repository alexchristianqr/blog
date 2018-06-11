<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top  " style="background-color: #24292e !important;color:rgba(255,255,255,0.75) !important;">
    <div class="container">
        <a class="navbar-brand" href="{{route('route.home')}}">
            <strong class="mr-1">Alex Christian</strong><span class="text-muted small">developer</span>
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation" style="outline: none !important;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="{{ request()->url() == route('route.about') ? 'nav-item active font-weight-bold' : 'nav-item' }}">
                    <a class="nav-link {{request()->url() == route('route.about') ? 'text-primary' : ''}}" href="{{route('route.about')}}"><i class="fa fa-exclamation-circle fa-fw"></i>@lang('pages.about')</a>
                </li>
                <li id="lineSeparate" class="mx-1 my-auto text-muted">|</li>
                <li class="{{ request()->url() == route('route.service') ? 'nav-item active font-weight-bold' : 'nav-item' }}">
                    <a class="nav-link {{request()->url() == route('route.service') ? 'text-primary' : ''}}" href="{{route('route.service')}}"><i class="fa fa-tags fa-fw"></i>@lang('pages.service')</a>
                </li>
                <li id="lineSeparate" class="mx-1 my-auto text-muted">|</li>
                <li class="{{ request()->url() == route('route.contact') ? 'nav-item active font-weight-bold' : 'nav-item' }}">
                    <a class="nav-link {{request()->url() == route('route.contact') ? 'text-primary' : ''}}" href="{{route('route.contact')}}"><i class="fa fa-phone fa-fw"></i>@lang('pages.contact')</a>
                </li>
                <li id="lineSeparate" class="mx-1 my-auto text-muted">|</li>
                <li class="{{ request()->url() == route('route.portfolio') ? 'nav-item active font-weight-bold' : 'nav-item' }}">
                    <a class="nav-link {{request()->url() == route('route.portfolio') ? 'text-primary' : ''}}" href="{{route('route.portfolio')}}"><i class="fa fa-github fa-fw"></i>@lang('pages.portfolio')</a>
                </li>
                <li id="lineSeparate" class="mx-1 my-auto text-muted">|</li>
                <li class="{{ request()->url() == route('route.blog',['latest']) ? 'nav-item active font-weight-bold' : 'nav-item' }}">
                    <a class="nav-link {{request()->url() == route('route.blog',['latest']) ? 'text-primary' : ''}}" href="{{route('route.blog',['latest'])}}"><i class="fa fa-slack fa-fw"></i>@lang('pages.blog')</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
