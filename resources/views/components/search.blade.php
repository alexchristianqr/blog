<div class="card mb-4">
    {!! Form::open(['url'=>$routeSearch,'method'=>'GET','autocomplete'=>'off']) !!}
    <h5 class="card-header text-dark">Search</h5>
    <div class="card-body">
        <input-search-layout :data-props="{param_request:'{{request('param_search')}}'}"></input-search-layout>
    </div>
    {!! Form::close() !!}
</div>