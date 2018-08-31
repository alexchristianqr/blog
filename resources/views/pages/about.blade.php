@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        @include('components.heading',['title'=>'About','subtitle'=>'Me'])

        {{--<ol class="breadcrumb">--}}
            {{--<li class="breadcrumb-item">--}}
                {{--<a href="index.html">Home</a>--}}
            {{--</li>--}}
            {{--<li class="breadcrumb-item active">About</li>--}}
        {{--</ol>--}}

        <!-- Intro Content -->
        <div class="row">
            <div class="col-lg-6">
                <img class="img-fluid rounded mb-4" src="{{asset('/images/profile.jpg')}}" alt="">
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-12">
                        <h2>Who I'm?</h2>
                        <p>Hola soy Alex Christian especialista en el desarrollo full-stack de <span class="mark bg-light font-weight-bold rounded">Aplicaciones Web y Moviles Híbridos</span>, me tome
                            el tiempo de actualizar mi plataforma personal para poder compartir con la comunidad de
                            desarrolladores mis experiencias, pasos y orígenes para iniciar y ser persistente.</p>
                        <p class="d-sm-block d-lg-none">Asi es ser persistente ante los miles de fracasos, inquietudes, desconocimiento de los
                            conceptos y tantas cosas que nos han pasado y seguiran pasando a medida que vayamos tomando
                            mas experiencia y aprendamos más y ser contínuo en ese punto.</p>
                    </div>
                    <div class="col-12">
                        <h2>Passion for Programming?</h2>
                        <p>Como pienso yó es importante hacer las cosas por pasión, debe nacer de manera natural el sér bueno, el sér investigador, el sér un pregunton sólido porque solo exigiéndose uno mismo logrará el objetivo.</p>
                        <p>Y uno de mis objetivos es tener éxito en la vida haciendo lo que mas me gusta y amo, y és el de <span class="mark bg-light font-weight-bold rounded">Programar</span> y es que yo cuando trabajo lo disfruto al 100%.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <h2>Experiences and Knowledge</h2>
        <p>Con el paso de los años poniendo a mucha muchísimas horas en práctica todos nuestros <span
                    class="mark bg-light rounded font-weight-bold">Conocimientos</span>, se logra muchos resultados
            sobre todo la <span class="mark bg-light rounded font-weight-bold">Experiencia</span> un valor de alta
            importancia para nosotros en esta carrera del desarrollo de software.</p>
        <p>Y estas son las tecnologías que son parte de mi experiencia:</p>
        <div class="row">
            @foreach($dataTecnologies as $vv)
                <div class="col-6 col-md-4 col-lg-3 mb-3 ">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="m-3">
                                <img class="card-img-top text-center" src="{{asset('/images/400x400/'.$vv->image)}}" alt="Image Technology">
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <span class="text-capitalize">{{$vv->name}}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- /.row -->
        <p class="mb-0">Recuerda que la práctica hace al maestro, debes tener mucho compromiso y sobretodo paciencia que lo bueno tarda pero llega.</p>
        <blockquote class="blockquote">
            <footer class="blockquote-footer"><b>Pasión, Compromiso y Paciencia</b><cite class="d-none d-md-inline d-lg-inline"> Alex Christian</cite></footer>
        </blockquote>
    </div>
    <!-- /.container -->
@endsection