<nav class="my-auto alert-warning">
    <div class="container">
        <div class="alert alert-warning fade show border-0 pl-0 pr-0 mb-0" role="alert" style="border-radius: 0">
            <div class="row">
                <div class="col-sm-8 col-md-9 col-lg-10 col-10 my-auto">
                    <span class="my-auto"><i class="fa fa-exclamation-circle mr-1"></i>{!! session()->get('message_warning') !!}</span>
                </div>
                <div class="col-sm-4 col-md-3 col-lg-2 col-2 my-auto">
                    <button type="button" class="close mb-1" data-dismiss="alert" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>