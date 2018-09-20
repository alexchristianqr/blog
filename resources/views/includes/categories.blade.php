<div class="card my-4">
    <h5 class="card-header text-dark">Category</h5>
    <div class="card-body">
        <div class="row">
            @foreach($dataCategory->chunk(6) as $chunk)
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <ul class="list-unstyled mb-0">
                        @foreach($chunk as $v)
                            <li class="mb-2 text-truncate">
                                <a title="{{$v->title}}" href="{{route('route.blog.category',['web-design'])}}" class="btn btn-link w-100 h-100 text-left"><span class="text-capitalize">{{$v->name}}</span></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</div>