@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        @include('components.heading',['title'=>'About','subtitle'=>'Me'])

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active">About</li>
        </ol>

        <!-- Intro Content -->
        <div class="row">
            <div class="col-lg-6">
                <img class="img-fluid rounded mb-4" src="{{asset('/images/profile.jpg')}}" alt="">
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-12">
                        <h2>¿Quien soy?</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur
                            similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem
                            perferendis dicta dolorem non blanditiis ex fugiat.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum
                            voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit,
                            temporibus reprehenderit dolorum!</p>
                    </div>
                    <div class="col-12">
                        <h2>¿Pasión por programar?</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur
                            similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem
                            perferendis dicta dolorem non blanditiis ex fugiat.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum
                            voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit,
                            temporibus reprehenderit dolorum!</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <h2>Experiencias y Conocimientos</h2>
        {{--<p><span class="mark bg-light rounded font-weight-bold">Experiencia</span> una palabra muy fuerte y la que muchos desarrolladores principiantes quieren lograr para independientemente de tener mas posición en el mercado, es por una pasión de ser mejor cada día.Y es que es una carrera tan competitiva y es dificl de explicar.</p>--}}
        <p>Con el paso de los años poniendo a mucha muchísimas horas en práctica todos nuestros <span class="mark bg-light rounded font-weight-bold">Conocimientos</span>, se logra muchos resultados sobre todo la <span class="mark bg-light rounded font-weight-bold">Experiencia</span> un valor de alta importancia para nosotros en esta carrera del desarrollo de software.</p>
        <p>Y estas son las tecnologías que son parte de mi experiencia:</p>
        <div class="row">
            @foreach($dataTecnologies->chunk(4) as $v)
                <div class="col-6 col-md-12 col-lg-12 mb-sm-0">
                    <div class="row">
                        @foreach($v as $vv)
                            <div class="col-sm-6 col-md-3 col-lg-3">
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <div class="m-3 m-md-4 m-lg-5">
                                            <img class="card-img-top text-center" src="{{asset('/images/400x400/'.$vv->image)}}" alt="image">
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <span class="text-capitalize">{{$vv->name}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <!-- /.row -->
        <h2>La paciencia es una virtud</h2>
        <blockquote class="blockquote">
            <p class="mb-0">Es una virtud que no se puede perder</p>
            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
        </blockquote>
    </div>
    <!-- /.container -->
@endsection