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

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <!-- Preview Image -->
                <img class="img-fluid rounded" src="{{asset($dataPost->path_name.$dataPost->image)}}" alt="Image Blog Post"/>
                <hr>

                <!-- Date/Time -->
                <div class="row">
                    <div class="col-sm-12 text-sm-left col-md-7 text-md-left col-lg-6 my-auto">
                        <span>Posted on </span><span>{{Carbon\Carbon::parse($dataPost->published)->format('F d, Y')}} at {{Carbon\Carbon::parse($dataPost->published)->format(' H:i')}}</span>
                    </div>
                    <div class="col-sm-12 text-sm-left col-md-5 text-md-right col-lg-6 my-auto">
                        <div class="ssk-group ssk-md ssk-count">
                            <a href="" class="ssk ssk-facebook"></a>
                            <a href="" class="ssk ssk-google-plus"></a>
                            <a href="" class="ssk ssk-linkedin"></a>
                            <a href="" class="ssk ssk-twitter"></a>
                        </div>
                    </div>
                </div>
                <hr>

                <!-- Post Content -->
                {!! $dataPost->content !!}

                <div class="card my-4">
                    <h5 class="card-header">I Like and Share in <span class="text-facebook">Facebook</span></h5>
                    <div class="card-body">
                        <div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="large" data-show-faces="false" data-share="true"></div>
                    </div>
                </div>

                <!-- Comments Form -->
                <div class="card my-4">
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
            <div class="col-lg-4">

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