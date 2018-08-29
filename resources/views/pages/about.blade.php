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
                        <h2>¿Como inicie la carrera de Programador?</h2>
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
        <div class="row">
            <div class="col-12 mb-4">
                <h3 class="mb-4">Conocimiento y Experiencia</h3>
                <div class="row">
                    <div class="col-sm-3 col-md-3 col-lg-2">
                        @foreach($dataTecnologies as $v)
                            @foreach($v as $vv)
                            <div class="card">
                                <div class="m-sm-3 m-md-3 m-lg-3">
                                    <img class="text-center" src="{{asset('/images/400x400/vue.png')}}" alt="image" width="200">
                                </div>
                                <div class="card-footer text-center">
                                    <span>{{$vv}}</span>
                                </div>
                            </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection