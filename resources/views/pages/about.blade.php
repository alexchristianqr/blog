@extends('layouts.app',['title'=>'About'])
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        @include('includes.heading',['title'=>'About','subtitle'=>'Me'])

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
        <h2 class="mb-3">Get Curriculum Vitae</h2>
        <div class="row mb-3">
            <div class="col-4">
                <div class="text-center">
                    <a href="#" class="text-success">
                        <i class="fa fa-file-excel-o fa-4x"></i>
                        <p class="pt-2 mb-0">Excel</p>
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="text-center">
                    <a href="{{asset('cv.docx')}}" class="text-primary">
                        <i class="fa fa-file-word-o fa-4x"></i>
                        <p class="pt-2 mb-0">Word</p>
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="text-center">
                    <a href="#" class="text-danger">
                        <i class="fa fa-file-pdf-o fa-4x"></i>
                        <p class="pt-2 mb-0">Pdf</p>
                    </a>
                </div>
            </div>
        </div>
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
        <!-- /.row -->
        <p class="mb-0">Recuerda que la práctica hace al maestro, debes tener mucho compromiso y sobretodo paciencia que lo bueno tarda pero llega.</p>
        <blockquote class="blockquote">
            <footer class="blockquote-footer"><b>Pasión, Compromiso y Paciencia</b><cite class="d-none d-md-inline d-lg-inline"> Alex Christian</cite></footer>
        </blockquote>
    </div>
    <!-- /.container -->
@endsection