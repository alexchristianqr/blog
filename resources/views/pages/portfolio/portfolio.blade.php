@extends('layouts.app',['title'=>'Portfolio'])
@section('content')
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading -->
        @include('includes.heading',['title'=>'Portfolio','subtitle'=>'of Projects'])

        <!-- Breadcrumb Component -->
        @include('includes.breadcrumbs', $dataBreadcrumb)

        <!-- Project One -->
        @foreach($dataPortfolio as $k => $v)
        <div class="row">
            <div class="col-lg-7">
                <a href="{{route('route.portfolio.item',[$v->kind])}}">
                    <img class="img-thumbnail img-fluid rounded mb-3 p-0 mb-lg-0" src="{{asset($v->path_name.$v->image)}}" alt="">
                </a>
            </div>
            <div class="col-lg-5">
                <h3>{{$v->name}}</h3>
                <div class="card-text">{!! $v->description !!}</div>
                <div class="row">
                    <div class="col-md-6 col-lg-12 my-auto">
                        <a href="{{route('route.portfolio.item',[$v->kind])}}" class="btn btn-primary">View Project <i class="fa fa-angle-right ml-1"></i></a>
                    </div>
                    <div class="col-md-6 col-lg-12 mt-3 mt-md-0 mt-lg-3">
                        @if($v->repository_github || $v->repository_codepen)
                            <span class="text-secondary d-block d-md-inline d-lg-block mr-1">This project allows you </span>
                        @endif
                        @isset($v->repository_github)
                            <a href="{{$v->repository_github}}" target="_blank" class="text-dark" title="View repository in github"><i class="fa fa-github-square fa-2x"></i></a>
                        @endisset
                        @isset($v->repository_codepen)
                            <a href="{{$v->repository_codepen}}" target="_blank" class="text-dark" title="View repository in codepen"><i class="fa fa-codepen fa-2x"></i></a>
                        @endisset
                    </div>
                </div>
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
            @if($dataPortfolio->count() != $k +1)
                <hr>
            @endif
            {{ $dataPortfolio->appends($_GET)->links() }}
        </div>
        @endif
    </div>
    <!-- /.container -->
@endsection