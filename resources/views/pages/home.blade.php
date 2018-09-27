@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($dataImages as $k => $v)
                    @if($k == 0)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$k}}" class="active"></li>
                    @else
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$k}}"></li>
                    @endif
                @endforeach
            </ol>
            <div class="carousel-inner" role="listbox">
                @foreach($dataImages as $k => $v)
                    @if($k == 0)
                        <div class="carousel-item active" style="background-image: url('{{asset($v->path_name.$v->image)}}')">
                            <div class="carousel-caption">
                                <h2 class="d-none d-lg-block">{{$v->title}}</h2>
                                <h3 class="d-lg-none d-sm-block">{{$v->title}}</h3>
                            </div>
                        </div>
                    @else
                        <div class="carousel-item" style="background-image: url('{{asset($v->path_name.$v->image)}}')">
                            <div class="carousel-caption">
                                <h2 class="d-none d-lg-block">{{$v->title}}</h2>
                                <h3 class="d-lg-none d-sm-block">{{$v->title}}</h3>
                            </div>
                        </div>
                    @endif
                @endforeach
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
    </header>

    <div class="container">

        <!-- Posts Section -->
        <h2 class="mt-4 text-dark">Descubre lo mejor</h2>
        <p>Encuentra mucha información sobre las últimas tecnologías que se utilizan hoy en dia, saber como usarlas y obtener un gran concepto.</p>
        <p>Ahora te presentamos en bloques los frameworks que podrias aprender</p>
        <!-- Carrousel -->
        <h3 class="text-dark">Frameworks Front-End</h3>
        <p>Son librerias escritas en un lenguaje que se ejecuta en el lado del cliente. Contienen un patron de trabajo organizado y funciones optimizadas, es necesario y util en la actualidad para la UIX del usuario.</p>
        <div class="row mb-3">
            <div class="col-12">
                <div style="
                display: flex;
                overflow: hidden;
                border: 1px solid #dee2e6;
                overflow-x: scroll">
                    @foreach($dataImagesFrontend as $k => $v)
                        <a href="{{route('route.blog.search').'?param_search='.$v->name}}" class="w-100 {{$dataCourses->count() == $k+1 ? '' : 'border-right'}}" style="background: url('{{asset($v->path_name.$v->image)}}') no-repeat center center scroll;background-size: cover;height: 200px;min-width: 57.5%;text-decoration: none">
                            <div style="
                            position: relative;
                            margin: 0.5rem;
                            display: flex">
                                <span class="{{$v->color}}" style="
                                position: absolute;
                                left: 0;
                                right: 0;
                                text-align: center;
                                font-weight: 400;
                                top: 9rem;
                                font-size: 1.5rem">{{$v->name}}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Carrousel -->
        <h3 class="text-dark">Frameworks Back-End</h3>
        <p>Son librerias escritas en un lenguaje que se ejecuta en el lado del servidor. Contienen un patron de trabajo organizado y funciones optimizadas, son muy utiles para la creacion servicios y micro-servicios apis rest.</p>
        <div class="row mb-3">
            <div class="col-12">
                <div style="
                display: flex;
                overflow: hidden;
                border: 1px solid #dee2e6;
                overflow-x: scroll">
                    @foreach($dataImagesBackend as $k => $v)
                        <a href="{{route('route.blog.search').'?param_search='.$v->name}}" class="w-100 {{$dataCourses->count() == $k+1 ? '' : 'border-right'}}" style="background: url('{{asset($v->path_name.$v->image)}}') no-repeat center center scroll;background-size: cover;height: 200px;min-width: 57.5%;text-decoration: none">
                            <div style="
                            position: relative;
                            margin: 0.5rem;
                            display: flex">
                                <span class="{{$v->color}}" style="
                                position: absolute;
                                left: 0;
                                right: 0;
                                text-align: center;
                                font-weight: 400;
                                top: 9rem;
                                font-size: 1.5rem">{{$v->name}}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Carrousel -->
        <h3 class="text-dark">Frameworks Mobile</h3>
        <p>Podemos aplicar frameworks escrito en javascript y mediante una optimizacion de codigo lograr ejecutar en android.</p>
        <div class="row mb-3">
            <div class="col-12">
                <div style="
                display: flex;
                overflow: hidden;
                border: 1px solid #dee2e6;
                overflow-x: scroll">
                    @foreach($dataImagesMobile as $k => $v)
                        <a href="{{route('route.blog.search').'?param_search='.$v->name}}" class="w-100 {{$dataCourses->count() == $k+1 ? '' : 'border-right'}}" style="background: url('{{asset($v->path_name.$v->image)}}') no-repeat center center scroll;background-size: cover;height: 200px;min-width: 57.5%;text-decoration: none">
                            <div style="
                            position: relative;
                            margin: 0.5rem;
                            display: flex">
                                <span class="{{$v->color}}" style="
                                position: absolute;
                                left: 0;
                                right: 0;
                                text-align: center;
                                font-weight: 400;
                                top: 9rem;
                                font-size: 1.5rem">{{$v->name}}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div hidden class="row mt-4">
            <div class="col-lg-12">
                <h2 class="text-dark">Bienvenido a mi sitio web personal</h2>
                <p>En este sitio web encontrarás mucha información tecnológica para desarrolladores y para pesonas que
                    sientan una atracción por la tecnología.</p>
                <p>Tecnologías como pueden ser:</p>
                <div class="row">
                    @foreach($dataTecnologies->chunk(5) as $chunk)
                        @foreach($chunk as $v)
                            <div class="col-sm-3 col-md-4 col-lg-3">
                                <ul>
                                    <li class="text-capitalize">{{$v->name}}</li>
                                </ul>
                            </div>
                        @endforeach
                    @endforeach
                    {{--<div class="col-sm-12 col-md-6">--}}
                        {{--<ul>--}}
                            {{--<li>Bootstrap v4</li>--}}
                            {{--<li>JQuery</li>--}}
                            {{--<li>Font Awesome</li>--}}
                            {{--<li>Vue 2</li>--}}
                            {{--<li>Angular 6</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-12 col-md-6">--}}
                        {{--<ul>--}}
                            {{--<li>React</li>--}}
                            {{--<li>Laravel Framework</li>--}}
                            {{--<li>Lumen Micro Framework</li>--}}
                            {{--<li>Node</li>--}}
                            {{--<li>Sails Framework</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                </div>
            </div>
            {{--<div class="col-lg-6">--}}
                {{--<img class="img-fluid rounded img-thumbnail" src="{{asset('images/dia.png')}}" alt="">--}}
            {{--</div>--}}
        </div>

        <!-- Call to Action Section -->
        <div class="row mt-4">
            <div class="col-md-6">
                <p class="text-secondary">Si estás interesado en nuestros articulos y quieres obtener mas información,
                    suscríbete a nuestro boletin de servicio informativo y entérate de más.</p>
            </div>
            <div class="col-md-6 my-auto">
                {{--<form action="">--}}
                {!! Form::open(['url'=>route('route.mail.subscribe'),'method'=>'post']) !!}
                <div class="input-group mb-3">
                    <input name="email" type="email" class="form-control" placeholder="Your email" required>
                    <div class="input-group-append">
                        {{--<a href="{{route('route.mail.subscribe')}}" class="btn btn-primary">Subscribe</a>--}}
                        <button class="btn btn-primary" type="submit">Subscribe</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
    <!-- /.container -->
@endsection