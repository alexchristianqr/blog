<nav class="my-auto alert-secondary">
    <div class="container">
        <div class="alert alert-secondary fade show border-0 pl-0 pr-0 mb-0" role="alert" style="border-radius: 0">
            <div class="row">
                <div class="col-11 my-auto">
                    <span class="my-auto">{{session()->get('message_success')}}</span>
                </div>
                <div class="col-1 my-auto">
                    <button type="button" class="close mb-1" data-dismiss="alert" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>