@extends('layouts.app',['myTitle'=>'Blog'])
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <h1 class="mt-4 mb-3">Blog</h1>

        <!-- Breadcrumb Component -->
        @include('components.breadcrumbs',$dataBreadcrumb)

        <!-- Content Row -->
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8 col-lg-8">

                <!-- Blog Post -->
                @for($i=0; $i<1; $i++)
                    <div class="card mb-4">
                        <img class="card-img-top" src="{{asset('images/750x300/01.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title">Productividad en Frameworks</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis
                                aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis
                                animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                            <a href="{{route('route.blog.post',['param-title-post'])}}" class="btn btn-primary my-auto">Read More <i class="fa fa-long-arrow-right"></i></a>
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

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4 col-lg-4">

                <!-- Search Component -->
                @include('components.search',$config=['route'=>route('route.blog.search')])

                <!-- Categories Component -->
                @include('components.categories')

                <!-- Side Widget -->
                <div class="card mb-4">
                    <h5 class="card-header">Side Widget</h5>
                    <div class="card-body">
                        You can put anything you want inside of these side widgets. They are easy to use, and feature
                        the new Bootstrap 4 card containers!
                    </div>
                </div>

             </div>

         </div>
         <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection