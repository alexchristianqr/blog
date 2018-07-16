@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading -->
        @include('components.heading',['title'=>'Portfolio','subtitle'=>'of Projects'])

        <!-- Breadcrumb Component -->
        @include('components.breadcrumbs', $dataBreadcrumb)

        <!-- Project One -->
        @foreach($dataPortfolio as $k => $v)
        <div class="row">
            <div class="col-md-7">
                <a href="{{route('route.blog.post',[Carbon\Carbon::parse($v->published)->format('Y'),Carbon\Carbon::parse($v->published)->format('m'),$v->kind])}}">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="{{asset($v->path_name.$v->image)}}" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>{{$v->name}}</h3>
                <p class="card-text">{{$v->description}}</p>
                <a href="{{route('route.blog.post',[Carbon\Carbon::parse($v->published)->format('Y'),Carbon\Carbon::parse($v->published)->format('m'),$v->kind])}}" class="btn btn-primary my-auto">View Project <i class="fa fa-angle-right ml-1"></i></a>
            </div>
        </div>
        <!-- /.row -->
        @if($dataPortfolio->count() != $k +1)
        <hr>
        @else
        <div class="mb-4"></div>
        @endif
        @endforeach

        <!-- Pagination -->
        @if ($dataPortfolio->hasPages())
        <div class="mb-4">
            <hr>
            {{ $dataPortfolio->appends($_GET)->links() }}
        </div>
        @endif
    </div>
    <!-- /.container -->
@endsection