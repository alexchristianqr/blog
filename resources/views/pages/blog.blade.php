@extends('layouts.app',['myTitle' => 'Blog'])
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row mb-lg-0 mb-3">
            <div class="col-sm-8 col-lg-8 my-auto">
                <h1 class="mt-4 mb-3 text-dark">Blog
                    <small class="ml-2 text-dark">Posts</small>
                </h1>
            </div>
            <div class="col-sm-4 col-lg-4 my-auto">
                <!-- Example split danger button -->
                <div class="input-group my-auto">
                    <span class="form-control">{{$blog_id}}</span>
                    <div class="input-group-append w-15">
                        <button type="button" class="btn btn-primary btn-block dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right w-100">
                            <a class="dropdown-item {{($blog_id == 'framework-frontend') ? 'active' : ''}}"
                               href="{{route('route.blog',['framework-frontend'])}}">Framework Frontend</a>
                            <a class="dropdown-item {{($blog_id == 'framework-backend') ? 'active' : ''}}"
                               href="{{route('route.blog',['framework-backend'])}}">Framework Backend</a>
                            <a class="dropdown-item {{($blog_id == 'framework-mobile') ? 'active' : ''}}"
                               href="{{route('route.blog',['framework-mobile'])}}">Framework Mobile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item {{($blog_id == 'latest') ? 'active' : ''}}"
                               href="{{route('route.blog',['latest'])}}">Latest</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb Component -->
    @include('components.breadcrumbs',$dataBreadcrumb)

    <!-- Content Row -->
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-7 col-lg-8">

                <!-- Blog Post -->
                @foreach($dataPost as $k => $v)
                    <div class="card mb-4">
                        <img class="card-img-top" src="{{asset($v->path_name.$v->image)}}" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title text-dark">{{$v->name}}</h2>
                            <p class="card-text">{{$v->description}}</p>
                            <a href="{{route('route.blog.post',[$blog_id,$v->kind])}}" class="btn btn-primary my-auto">Read
                                More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                        <div class="card-footer text-muted">
                            <span>Posted </span><span>{{\Carbon\Carbon::parse($v->published)->format('F d, Y')}}</span><span> by </span><a href="#">{{$v->user_name}}</a>
                        </div>
                    </div>
            @endforeach

            <!-- Pagination -->
                <div class="mb-4">
                    {{ $dataPost->appends($_GET)->links('pagination::simple-bootstrap-4') }}
                </div>

            </div>


            <!-- Sidebar Widgets Column -->
            <div class="col-md-5 col-lg-4">

                <!-- Search Component -->
            @include('components.search',$config=['route'=>route('route.blog.search')])

            <!-- Categories Component -->
            @include('components.categories',[$dataCategory, $blog_id])

            <!-- Widget Component -->
            @include('components.widget')

            <!-- Posts History Component -->
            @include('components.post-history')

            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection