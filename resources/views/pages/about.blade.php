@extends('layouts.app',['title'=>'About'])
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        @include('includes.heading',['title'=>'About','subtitle'=>'Me'])

        <!-- Intro Content -->
        <div class="row">
            <div class="col-lg-6">
                <img class="img-fluid rounded mb-4" src="{{asset('/images/about/me.jpeg')}}" alt="">
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-12">
                        <h2>¿Quién Soy?</h2>
                        <p>Hola soy Alex Christian especialista en el desarrollo full-stack de <span class="mark bg-light font-weight-light rounded">Aplicaciones Web y Móviles Híbrido,</span> me tome
                            el tiempo de actualizar mi plataforma personal para poder compartir con la comunidad de
                            desarrolladores mis experiencias, pasos y orígenes para iniciar y ser persistente.</p>
                        <p class="d-sm-block d-lg-none">Asi es ser persistente ante los miles de fracasos, inquietudes, desconocimiento de los
                            conceptos y tantas cosas que nos han pasado y seguiran pasando a medida que vayamos tomando
                            mas experiencia y aprendamos más y ser contínuo en ese punto.</p>
                    </div>
                    <div class="col-12">
                        <h2>Pasión por Programar</h2>
                        <p>Es importante hacer las cosas por pasión, debe nacer y fluir de manera natural el sér bueno, el sér investigador, el sér un pregunton sólido porque solo exigiéndose uno mismo se logrará el objetivo.</p>
                        <p>Mi mayor objetivo es tener éxito en la vida haciendo lo que mas me gusta y amo y es <span class="mark bg-light font-weight-light rounded">Programar</span> y es que escribir cada codigo es un disfrúte al 100%.</p>
                    </div>
                </div>
            </div>
        </div>

        <h2>Experiencias y Conocimientos</h2>
        <p>Con el paso de los años poniendo a mucha muchísimas horas en práctica todos nuestros <span class="mark bg-light rounded font-weight-light">Conocimientos,</span> se logra muchos resultados
            sobre todo la <span class="mark bg-light rounded font-weight-light">Experiencia</span> un valor de alta
            importancia para nosotros en esta carrera del desarrollo de software.</p>
        <p>Y estas son las tecnologías que son parte de mi experiencia:</p>
        <div class="row">
            @foreach($dataTecnologies as $vv)
                <div class="col-6 col-md-4 col-lg-3 mb-3 ">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="m-3">
                                <img class="card-img-top text-center" src="{{asset($vv->path_name.$vv->image)}}" alt="Image Technology">
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <span class="text-capitalize">{{$vv->name}}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <h2 class="mb-3">Curriculum Vitae</h2>
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-7">
                <div class="row">
                    <div class="col-5 my-auto">
                        <div class="text-center">
                            <a href="{{asset('AlexChristianQuispeRoque.docx')}}" class="text-primary" style="text-decoration: none">
                                <i class="fa fa-file-word-o fa-2x"></i>
                                <p class="small">Download CV</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-7 my-auto">
                        <p class="font-weight-light">Puedes descargar mi hoja de vida y obtener información mas detallada.</p>
                    </div>
                </div>
            </div>
        </div>

        <p class="mb-3">Recuerda que la práctica hace al maestro, debes tener mucho compromiso y sobretodo paciencia que lo bueno tarda pero llega.</p>
        <blockquote class="blockquote font-italic">
            <footer class="blockquote-footer"><b>Pasión, Compromiso y Paciencia</b></footer>
        </blockquote>

    </div>
    <!-- /.container -->
@endsection