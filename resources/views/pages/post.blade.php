@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3 text-dark">{{$dataPost->name}}<small class="text-dark"> by <a href="{{$routeSearch.'?param_search='.$dataPost->user_name}}">{{$dataPost->user_name}}</a></small></h1>

        <!-- Breadcrumb Component -->
        @include('components.breadcrumbs', $dataBreadcrumb)

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-sm-12 col-md-8 col-lg-8">

                <!-- Preview Image -->
                <img class="img-fluid rounded" src="{{asset($dataPost->path_name.$dataPost->image)}}" alt="Image Post">
                <hr>

                <!-- Date/Time -->
                <span>Posted on </span><span>{{Carbon\Carbon::parse($dataPost->published)->format('F d, Y')}} at {{Carbon\Carbon::parse($dataPost->published)->format(' H:i')}}</span>
                <hr>

                <!-- Post Content -->
                {!! $dataPost->content !!}
                <hr>

                <!-- Comments Form -->
                <div class="card my-2">
                    <h5 class="card-header">Add Your Comment</h5>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" title=""></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Comment</button>
                        </form>
                    </div>
                </div>

                <!-- Coments Component -->
                @include('components.coments')

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-sm-12 col-md-4 col-lg-4">

                <!-- Search Component -->
                @include('components.search', [$routeSearch])

                <!-- Tags Component-->
                @include('components.tags',[$dataTag,$routeSearch])

                <!-- Categories Widget -->
                @include('components.categories',[$dataCategory])

                <!-- Posts History Component -->
                @include('components.history',[$dataHistory, $dataMonths])

            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection