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
                        <div class="carousel-item active"
                             style="background-image: url('{{asset($v->path_name.$v->image)}}')">
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
        <p>Aqui encontraras mucha información sobre las últimas tecnologías que se utilizan hoy en dia, obtener un gran
            concepto y aprender a usarlas. Por ejemplo frameworks, librerias, plugins y cientos de materiales que
            nos facilitan en el desarrollo de aplicaciones web.</p>
        <!-- Carrousel -->
        <h3 class="text-dark">Tecnologías Frontend</h3>
        <p>Son las tecnologías que se ejecutan del lado del cliente, es decir tecnologías ejecutadas en el
            navegador o browser. En contexto tres lenguajes principales que hacen al frontend son <span class="mark bg-light font-weight-light rounded">Html, Css y
                Javascript.</span></p>
        <p>Es importante recalcar que el frontend de hoy en dia es mas popular por el gran paso de rendimiento que
            aportan los frameworks de javascript.</p>
        <div class="row mb-3">
            <div class="col-12">
                <div style="
                display: flex;
                overflow: hidden;
                border: 1px solid #dee2e6;
                overflow-x: scroll">
                    @foreach($dataImagesFrontend as $k => $v)
                        <a href="{{route('route.blog.search').'?param_search='.$v->name}}"
                           class="w-100 {{$dataCourses->count() == $k+1 ? '' : 'border-right'}}"
                           style="background: url('{{asset($v->path_name.$v->image)}}') no-repeat center center scroll;background-size: cover;height: 200px;min-width: 57.5%;text-decoration: none">
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
        <h3 class="text-dark">Tecnologías Backend</h3>
        <p>Son las tecnologías que se ejecutan del lado del servidor, la interacción con las bases de datos y todo el
            proceso de manipulación y control que provee al Frontend. En contexto los lenguajes mas populares son <span class="mark bg-light font-weight-light rounded">Java, Php, Python, etc.</span></p>
        <p>Entre los frameworks mas populares están <span class="mark bg-light font-weight-light rounded">Laravel, Slim, Lumen, Nodejs, etc.</span></p>
        <div class="row mb-3">
            <div class="col-12">
                <div style="
                display: flex;
                overflow: hidden;
                border: 1px solid #dee2e6;
                overflow-x: scroll">
                    @foreach($dataImagesBackend as $k => $v)
                        <a href="{{route('route.blog.search').'?param_search='.$v->name}}"
                           class="w-100 {{$dataCourses->count() == $k+1 ? '' : 'border-right'}}"
                           style="background: url('{{asset($v->path_name.$v->image)}}') no-repeat center center scroll;background-size: cover;height: 200px;min-width: 57.5%;text-decoration: none">
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
        <h3 class="text-dark">Tecnologías Móviles</h3>
        <p>Para lograr el desarrollo de aplicaciones móviles, es necesario tener el conocimiento de <span class="mark bg-light font-weight-light rounded">Java, Kotlin, C#, Swift, etc.</span></p>
        <p>Hoy en dia javascript hace posible esto con el uso de sus frameworks como <span class="mark bg-light font-weight-light rounded">Ionic, Native Script, React Native, etc.</span></p>
        <div class="row mb-3">
            <div class="col-12">
                <div style="
                display: flex;
                overflow: hidden;
                border: 1px solid #dee2e6;
                overflow-x: scroll">
                    @foreach($dataImagesMobile as $k => $v)
                        <a href="{{route('route.blog.search').'?param_search='.$v->name}}"
                           class="w-100 {{$dataCourses->count() == $k+1 ? '' : 'border-right'}}"
                           style="background: url('{{asset($v->path_name.$v->image)}}') no-repeat center center scroll;background-size: cover;height: 200px;min-width: 57.5%;text-decoration: none">
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
                </div>
            </div>
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
                    <input name="email" type="email" class="form-control" placeholder="Email" required>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Subscribe<span
                                    class="d-none d-md-inline d-lg-inline"> to my List</span></button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- /.container -->
@endsection