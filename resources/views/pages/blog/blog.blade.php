@extends('layouts.app',['title'=>'Blog'])
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <h1 class="mt-4 mb-3 text-dark">Blog
            <small class="text-dark">Posts</small>
        </h1>

        <!-- Breadcrumb Component -->
        @include('components.breadcrumbs', $dataBreadcrumb)

        <!-- Content Row -->
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-7 col-lg-8">

                <!-- Blog Post -->
                @foreach($dataPost as $k => $v)
                    <div class="card mb-4">
                        <img class="card-img-top" src="{{asset($v->path_name.$v->image)}}" alt="Image Blog Post">
                        <div class="card-body">
                            <h2 class="card-title text-dark">{{$v->name}}</h2>
                            <p class="card-text">{{$v->description}}</p>
                            <a href="{{route('route.blog.post',[Carbon\Carbon::parse($v->published)->format('Y'),Carbon\Carbon::parse($v->published)->format('m'),$v->kind])}}" class="btn btn-primary my-auto">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                        <div class="card-footer text-muted">
                            <span>Posted </span><span>{{Carbon\Carbon::parse($v->published)->format('F d, Y')}}</span><span> by </span><a href="{{$routeSearch.'?param_search='.$v->user_name}}">{{$v->user_name}}</a>
                        </div>
                    </div>
                @endforeach

                <!-- Pagination -->
                <div class="mb-4">
                    {{ $dataPost->appends($_GET)->links() }}
                </div>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-5 col-lg-4">

                <!-- Search Component -->
                @include('components.search',[$routeSearch])

                <!-- Categories Component -->
                @include('components.categories',[$dataCategory])

                <!-- Posts History Component -->
                @include('components.history',[$dataHistory, $dataMonths])

            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection