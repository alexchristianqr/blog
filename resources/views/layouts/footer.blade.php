<div class="container">
    <div class="bg-light {{request()->routeIs('route.blog.post')?'py-md-3 py-lg-4':'py-2 py-md-3 py-lg-4'}}" style="{{request()->routeIs('route.blog.post')?'padding-bottom: 3.65rem;padding-top: 0.75rem;':''}}">
        <div class="row">
            <div class="col-5 col-md-4 col-lg-4 my-auto text-center">
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
            <div class="col-5 col-md-4 col-lg-4 my-auto text-center">
                    <span class="text-secondary">by Alex Christian</span>
                </div>
        </div>
    </div>
</div>