@extends('layouts.app',['title'=>'Blog Post'])
@section('content-metas-share')
    @include('components.metas-share',[$dataShare])
@endsection
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3 text-dark">{{$dataPost->name}}<small class="text-dark"> by <a href="{{$routeSearch.'?param_search='.$dataPost->user_name}}">{{$dataPost->user_name}}</a></small></h1>

        <!-- Breadcrumb Component -->
        @include('components.breadcrumbs',$dataBreadcrumb)

    <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <img class="img-fluid" src="http://placehold.it/750x500" alt="">
            </div>

            <div class="col-md-4">
                <h3 class="my-3">Project Description</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
                <h3 class="my-3">Project Details</h3>
                <ul>
                    <li>Lorem Ipsum</li>
                    <li>Dolor Sit Amet</li>
                    <li>Consectetur</li>
                    <li>Adipiscing Elit</li>
                </ul>
            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection