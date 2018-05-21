@extends('layouts.app',['myTitle'=>'Home'])
@section('content')
    {{--<header>--}}
        {{--<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">--}}
            {{--<ol class="carousel-indicators">--}}
                {{--<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>--}}
                {{--<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>--}}
                {{--<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>--}}
            {{--</ol>--}}
            {{--<div class="carousel-inner" role="listbox">--}}
                {{--<!-- Slide One - Set the background image for this slide in the line below -->--}}
                {{--<div class="carousel-item active" style="background-image: url('images/02.jpg')">--}}
                    {{--<div class="carousel-caption d-none d-md-block">--}}
                        {{--<h3>First Slide</h3>--}}
                        {{--<p>This is a description for the first slide.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- Slide Two - Set the background image for this slide in the line below -->--}}
                {{--<div class="carousel-item" style="background-image: url('images/02.jpg')">--}}
                    {{--<div class="carousel-caption d-none d-md-block">--}}
                        {{--<h3>Second Slide</h3>--}}
                        {{--<p>This is a description for the second slide.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- Slide Three - Set the background image for this slide in the line below -->--}}
                {{--<div class="carousel-item" style="background-image: url('images/02.jpg')">--}}
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

    <div id="app" class="container">
        <div class="row mt-5">
            <div class="col-6 my-auto">
                <h1>Courses</h1>
            </div>
            <div class="col-6 my-auto">
                <a href="{{route('route.blog')}}" class="btn btn-outline-primary pull-right">See More <i
                            class="fa fa-long-arrow-right"></i></a>
            </div>
        </div>
        <hr>
        <!-- Marketing Icons Section -->
        <courses></courses>
        <!-- /.row -->

        <!-- Portfolio Section -->
        <div class="row mt-5">
            <div class="col-6 my-auto">
                <h1>Portfolio</h1>
            </div>
            <div class="col-6 my-auto">
                <a href="{{route('route.portfolio')}}" class="btn btn-outline-primary pull-right">See More <i class="fa fa-long-arrow-right"></i></a>
            </div>
        </div>
        <hr>
        <portfolio></portfolio>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image: url('images/02.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                        <a href="#" class="h3 text-white">App Gmail Hibrida</a>
                        <p>This is a description for the first slide.</p>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('images/02.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Second Slide</h3>
                        <p>This is a description for the second slide.</p>
                    </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('images/02.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Third Slide</h3>
                        <p>This is a description for the third slide.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- /.row -->

        <!-- Features Section -->
        <div class="row my-5">
            <div class="col-lg-6">
                <h2>Modern Business Features</h2>
                <p>The Modern Business template by Start Bootstrap includes:</p>
                <ul>
                    <li>
                        <strong>Bootstrap v4</strong>
                    </li>
                    <li>jQuery</li>
                    <li>Font Awesome</li>
                    <li>Working contact form with validation</li>
                    <li>Unstyled page elements for easy customization</li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id
                    reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia
                    dolorum ducimus unde.</p>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded" src="http://placehold.it/700x450" alt="">
            </div>
        </div>
        <!-- /.row -->
        <hr>

        <!-- Call to Action Section -->
        <div class="row mb-4">
            <div class="col-md-8">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum
                    deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
            </div>
            <div class="col-md-4">
                <a class="btn btn-lg btn-secondary btn-block" href="#">Call to Action</a>
            </div>
        </div>
    </div>
@endsection