@extends('layouts.app',['title'=>'Search in Blog Post'])
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="mt-4 mb-3 mb-lg-0">
            <div class="row">
                <div class="col-sm-12 col-lg-8 my-auto">
                    <h1 class="text-dark">Search <small class="text-dark">in Website</small></h1>
                </div>
                <div class="col-sm-12 col-lg-4 my-auto">
                    {!! Form::open(['url'=>$routeSearch,'method'=>'GET','autocomplete'=>'off']) !!}
                        @include('includes.input-search')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <!-- Breadcrumb -->
        @include('includes.breadcrumbs', $dataBreadcrumb)

        <!-- Elements Searched -->
        <div class="row">
        @forelse($dataSearch->chunk(1) as $k =>$chunk)
        <div class="col-lg-6 mb-4">
            @foreach($chunk as $v)
            <div class="card h-100">
                <img class="card-img-top" src="{{asset($v->path.$v->image)}}" alt="Image Search"/>
                <div class="card-body">
                    <h2 class="card-title text-dark">{{$v->name}}</h2>
                    <p class="card-text">{{$v->description}}</p>
                    <a href="{{route('route.blog.post',[Carbon\Carbon::parse($v->published)->format('Y'),Carbon\Carbon::parse($v->published)->format('m'),$v->kind])}}" class="btn btn-primary my-auto">Read More <i class="fa fa-long-arrow-right"></i></a>
                </div>
                <div class="card-footer text-muted">
                    <span class="d-none d-md-inline d-lg-inline">Posted </span><span>{{Carbon\Carbon::parse($v->published)->format('F d, Y')}}</span><span> by </span><a href="{{$routeSearch.'?param_search='.$v->user_name}}">{{$v->user_name}}</a>
                </div>
            </div>
            {{--<div class="card h-100">--}}
                {{--<img class="card-img-top" src="{{asset($v->path_name.$v->image)}}" alt="Image Search"/>--}}
                {{--<div class="card-body">--}}
                    {{--<h2 class="card-title text-dark">{{$v->name}}</h2>--}}
                    {{--<p class="card-text">{{$v->description}}</p>--}}
                {{--</div>--}}
                {{--<div class="card-footer text-muted">--}}
                    {{--<span class="d-none d-md-inline d-lg-inline">Posted </span><span>{{Carbon\Carbon::parse($v->published)->format('F d, Y')}}</span><span> by </span><a href="{{$routeSearch.'?param_search='.$v->user_name}}">{{$v->user_name}}</a>--}}
                {{--</div>--}}
                {{--<div class="card-footer p-0">--}}
                    {{--<a href="#" class="my-btn-link btn-block pt-3 pb-3 border-0" style="text-decoration: none">Get Course by <i class="fa fa-dollar"></i><b>10</b></a>--}}
                {{--</div>--}}
            {{--</div>--}}
            @endforeach
        </div>
        @empty
        <div class="col-lg-12 mb-5 mt-5 text-center">
            <i class="fa fa-search fa-2x w-100 text-dark"></i>
            <div class="w-100"><p></p></div>
            <span class="text-dark">No se han encontrado registros con <b><mark class="bg-light rounded">{{request('param_search')}}</mark></b> como parámetro de búsqueda</span>
            <div class="w-100 text-white">
                <p>.</p>
                <p>.</p>
            </div>
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