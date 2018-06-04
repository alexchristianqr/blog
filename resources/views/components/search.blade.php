<div class="card mb-4">
    {!! Form::open(['url'=>$route,'method'=>'GET','autocomplete'=>'off']) !!}
    <h5 class="card-header text-dark">Search</h5>
    <div class="card-body">
        <input-search :data-props="{param_request:'{{request('param_search')}}'}"></input-search>
    </div>
    {!! Form::close() !!}
</div>