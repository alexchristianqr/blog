@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="mt-4 mb-3 mb-lg-0">
            <div class="row">
                <div class="col-sm-12 col-lg-6 my-auto">
                    <h1 class="text-dark">Search <small class="text-dark">in Website</small></h1>
                </div>
                <div class="col-sm-12 col-lg-6 my-auto">
                    {!! Form::open(['url'=>$routeSearch,'method'=>'GET','autocomplete'=>'off']) !!}
                        <input-search-layout :data-props="{param_request:'{{request('param_search')}}'}"></input-search-layout>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <!-- Breadcrumb Component -->
        @include('components.breadcrumbs', $dataBreadcrumb)

        <!-- Blog Post -->
        <div class="row">
        @forelse($dataSearch->chunk(1) as $k =>$chunk)
        <div class="col-lg-6 mb-4">
            @foreach($chunk as $v)
            <div class="card">
                <img class="card-img-top" src="{{asset($v->path_name.$v->image)}}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title text-dark">{{$v->name}}</h2>
                    <p class="card-text">{{$v->description}}</p>
                    <a href="{{route('route.blog.post',[Carbon\Carbon::parse($v->published)->format('Y'),Carbon\Carbon::parse($v->published)->format('m'),$v->kind])}}" class="btn btn-primary my-auto">Read More <i class="fa fa-long-arrow-right"></i></a>
                </div>
                <div class="card-footer text-muted">
                    <span>Posted on </span><span>{{Carbon\Carbon::parse($v->published)->format('F d, Y')}}</span><span> by </span><a href="#">{{$v->user_name}}</a>
                </div>
            </div>
            @endforeach
        </div>
        @empty
        <div class="col-lg-12 mb-5 mt-5 text-center">
            <span class="text-dark">No se han encontrado registros, basado en tu busqueda</span>
        </div>
        @endforelse
        </div>

        <!-- Pagination -->
        @if ($dataSearch->hasPages())
        <div class="mb-4">
            {{ $dataSearch->appends($_GET)->links() }}
        </div>
        @endif

    </div>
    <!-- /.container -->
@endsection