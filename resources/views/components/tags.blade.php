<div class="card my-4">
    <h5 class="card-header text-dark">Tags</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <ul class="list-unstyled my-auto m-0">
                    @forelse($dataTag as $v)
                        <a title="Buscar {{$v->name}}" href="{{ route('route.blog.post.search',[$year,$month,$post_id]).'?param_search='.$v->name }}" class="btn btn-light text-left mt-1 mb-1"><span class="text-capitalize">{{$v->name}}</span></a>
                    @empty
                        <span class="text-center">No hay tags asociados.</span>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>