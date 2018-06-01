@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="mt-4 mb-3">
            <div class="row">
                <div class="col-sm-12 col-lg-6 my-auto">
                    <h1 class="text-dark">Search</h1>
                </div>
                <div class="col-sm-12 col-lg-6 my-auto">
                    {!! Form::open(['url'=>$dataSearch['route'],'method'=>'GET','autocomplete'=>'off']) !!}
                        <input-search :data-props="{param_request:'{{request('param_search')}}'}"></input-search>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <!-- Breadcrumb Component -->
    @include('components.breadcrumbs',$dataBreadcrumb)

    <!-- Blog Post -->
        @for($i=0; $i<1; $i++)
            <div class="card mb-4">
                <img class="card-img-top" src="{{asset('images/750x300/01.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title text-dark">Productividad en Frameworks</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis
                        aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis
                        animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                    <a href="{{route('route.blog.post',['param-title-post'])}}" class="btn btn-primary my-auto">Read
                        More <i class="fa fa-long-arrow-right"></i></a>
                </div>
                <div class="card-footer text-muted">
                    Posted on January 1, 2017 by
                    <a href="#">Alex Christian</a>
                </div>
            </div>
    @endfor

    <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
                <a class="page-link" href="#"><i class="fa fa-angle-left mr-2"></i>Back</a>
            </li>
            <li class="page-item disabled">
                <a class="page-link" href="#">Next<i class="fa fa-angle-right ml-2"></i></a>
            </li>
        </ul>

    </div>
    <!-- /.container -->
@endsection