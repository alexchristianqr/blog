<div class="card mb-4">
    {!! Form::open(['url'=>$routeSearch,'method'=>'GET','autocomplete'=>'off']) !!}
    <h5 class="card-header text-dark">Search</h5>
    <div class="card-body">
        @include('includes.input-search')
    </div>
    {!! Form::close() !!}
</div>