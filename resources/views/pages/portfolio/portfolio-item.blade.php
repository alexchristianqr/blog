@extends('layouts.app',['title'=>'Portfolio item'])
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <h1 class="mt-4 mb-3 text-dark">Portfolio
            <small class="text-dark">Project</small>
        </h1>

        <!-- Breadcrumb Component -->
    @include('components.breadcrumbs',$dataBreadcrumb)

    <!-- Portfolio Item Row -->
        <div class="row mb-4">

            <div class="col-sm-12 col-md-12 col-lg-12">
                {{--<div class="card-img-top h-25">--}}
                {{--<header>--}}
                {{--<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">--}}
                {{--<ol class="carousel-indicators">--}}
                {{--<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>--}}
                {{--<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>--}}
                {{--<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>--}}
                {{--</ol>--}}
                {{--<div class="carousel-inner" role="listbox">--}}
                {{--<!-- Slide One - Set the background image for this slide in the line below -->--}}
                {{--<div class="carousel-item active" style="background-image: url('http://placehold.it/1900x1080')">--}}
                {{--<div class="carousel-caption d-none d-md-block">--}}
                {{--<h3>First Slide</h3>--}}
                {{--<p>This is a description for the first slide.</p>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<!-- Slide Two - Set the background image for this slide in the line below -->--}}
                {{--<div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">--}}
                {{--<div class="carousel-caption d-none d-md-block">--}}
                {{--<h3>Second Slide</h3>--}}
                {{--<p>This is a description for the second slide.</p>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<!-- Slide Three - Set the background image for this slide in the line below -->--}}
                {{--<div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">--}}
                {{--<div class="carousel-caption d-none d-md-block">--}}
                {{--<h3>Third Slide</h3>--}}
                {{--<p>This is a description for the third slide.</p>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">--}}
                {{--<span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
                {{--<span class="sr-only">Previous</span>--}}
                {{--</a>--}}
                {{--<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">--}}
                {{--<span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
                {{--<span class="sr-only">Next</span>--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--</header>--}}
                {{--</div>--}}
                <img class="card-img" src="{{asset($dataPortfolioProject->path_name.$dataPortfolioProject->image)}}" alt="Image Blog Posts">

                {{--<img class="card-img mt-3" src="{{asset($dataPortfolioProject->path_name.$image)}}" alt="Image Blog Posts">--}}
                <header hidden>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                        @foreach(json_decode($dataPortfolioProject->gallery) as $k => $image)
                            @if($k == 1)
                                {{--<!-- Slide One - Set the background image for this slide in the line below -->--}}
                                    <div class="carousel-item active"
                                         style="background-image: url('{{asset($dataPortfolioProject->path_name.$image)}}')">
                                    </div>
                                    {{--<img class="carousel-item" src="{{asset($dataPortfolioProject->path_name.$dataPortfolioProject->image)}}" alt="">--}}
                            @else
                                <!-- Slide Two - Set the background image for this slide in the line below -->
                                    <div class="carousel-item"
                                         style="background-image: url('{{asset($dataPortfolioProject->path_name.$image)}}')">
                                    </div>
                                @endif
                        @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                           data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </header>

                {{--<img class="img-fluid" src="http://placehold.it/750x500" alt="">--}}
            </div>

            <div class="col-sm-12 col-md-12 col-lg-12">
                <h3 class="mt-3 mt-lg-0">Project Description</h3>
                <div class="card-text">{!! $dataPortfolioProject->description !!}</div>
                {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>--}}
                <h3 class="my-3">Project Details</h3>
                <div class="row">
                    <div class="col-6">
                        <ul>
                            <li>Vue</li>
                            <li>ES 6</li>
                            <li>Javascript</li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul>
                            <li>Html 5</li>
                            <li>Laravel 5.5</li>
                            <li>Php 7</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection