<div  class="container">
    <div class="bg-default {{request()->routeIs('route.blog.post')?'py-md-3 py-lg-4':'py-2 py-md-3 py-lg-4'}}" style="{{request()->routeIs('route.blog.post')?'padding-bottom: 3.65rem;padding-top: 0.75rem;':''}}">
        <div class="row">
            <div class="col-12 h-100 text-center text-md-left text-lg-left">
                <ul class="list-inline mb-1 mt-2 mt-md-0 mt-lg-0">
                    <li class="list-inline-item"><a href="{{route('route.policies.terms')}}">Terms of Use</a></li>
                    <li class="list-inline-item"><a href="#privacy">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="#publicity">Publicity</a></li>
                    <li class="list-inline-item"><a href="#cookie">Cookies</a></li>
                </ul>
            </div>
            <div class="col-5 col-md-4 col-lg-4 my-auto text-center text-md-left text-lg-left">
                <span class="text-secondary"><i class="fa fa-copyright"></i> {{date('Y')}} <span class="d-none d-md-inline-block d-lg-inline-block">All right reserved</span></span>
            </div>
            <div class="col-2 col-md-4 col-lg-4 my-auto text-center">
                <a href="https://web.facebook.com/alexchristianqr" target="_blank" class="d-none d-md-inline-block d-lg-inline-block">
                    <i class="fa fa-facebook-square fa-2x text-secondary m-1"></i>
                </a>
                <a href="https://github.com/acqrdeveloper" target="_blank" class="d-md-inline-block d-lg-inline-block">
                    <i class="fa fa-github fa-2x text-secondary m-1"></i>
                </a>
                <a href="https://plus.google.com/u/0/113216805867137975496" target="_blank" class="d-none d-md-inline-block d-lg-inline-block">
                    <i class="fa fa-google-plus-square fa-2x text-secondary m-1"></i>
                </a>
            </div>
            <div class="col-5 col-md-4 col-lg-4 my-auto text-center text-md-right text-lg-right">
                    <a href="{{route('route.home')}}" class="text-secondary" style="text-decoration: none">by Alex Christian</a>
                </div>
        </div>
    </div>
</div>