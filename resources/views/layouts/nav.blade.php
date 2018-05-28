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
                    <a class="nav-link" href="{{route('route.about')}}"><i class="fa fa-exclamation-circle fa-fw"></i>About</a>
                </li>
                <li id="lineSeparate" class="mx-1 my-auto text-muted">|</li>
                <li class="{{ request()->url() == route('route.service') ? 'nav-item active font-weight-bold' : 'nav-item' }}">
                    <a class="nav-link" href="{{route('route.service')}}"><i class="fa fa-tags fa-fw"></i>Services</a>
                </li>
                <li id="lineSeparate" class="mx-1 my-auto text-muted">|</li>
                <li class="{{ request()->url() == route('route.contact') ? 'nav-item active font-weight-bold' : 'nav-item' }}">
                    <a class="nav-link" href="{{route('route.contact')}}"><i class="fa fa-phone fa-fw"></i>Contact</a>
                </li>
                <li id="lineSeparate" class="mx-1 my-auto text-muted">|</li>
                <li class="{{ request()->url() == route('route.portfolio') ? 'nav-item active font-weight-bold' : 'nav-item' }}">
                    <a class="nav-link" href="{{route('route.portfolio')}}"><i class="fa fa-github fa-fw"></i>Portfolio</a>
                </li>
                <li id="lineSeparate" class="mx-1 my-auto text-muted">|</li>
                <li class="{{ request()->url() == route('route.blog') ? 'nav-item active font-weight-bold' : 'nav-item' }}">
                    <a class="nav-link" href="{{route('route.blog')}}"><i class="fa fa-slack fa-fw"></i>Blog</a>
                </li>
                <div hidden>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Portfolio
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"
                             aria-labelledby="navbarDropdownPortfolio">
                            <a class="dropdown-item" href="portfolio-1-col.html">1 Column Portfolio</a>
                            <a class="dropdown-item" href="portfolio-2-col.html">2 Column Portfolio</a>
                            <a class="dropdown-item" href="portfolio-3-col.html">3 Column Portfolio</a>
                            <a class="dropdown-item" href="portfolio-4-col.html">4 Column Portfolio</a>
                            <a class="dropdown-item" href="portfolio-item.html">Single Portfolio Item</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Blog
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                            <a class="dropdown-item" href="blog-home-1.html">Blog Home 1</a>
                            <a class="dropdown-item" href="blog-home-2.html">Blog Home 2</a>
                            <a class="dropdown-item" href="blog-post.html">Blog Post</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Other Pages
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                            <a class="dropdown-item" href="full-width.html">Full Width Page</a>
                            <a class="dropdown-item" href="sidebar.html">Sidebar Page</a>
                            <a class="dropdown-item" href="faq.html">FAQ</a>
                            <a class="dropdown-item" href="404.html">404</a>
                            <a class="dropdown-item" href="pricing.html">Pricing Table</a>
                        </div>
                    </li>
                </div>
            </ul>
        </div>
    </div>
</nav>
