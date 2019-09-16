@extends('layouts.app',['title'=>'Portfolio item'])
@section('content')
    <!-- Page Content -->
    <div class="container">

        {{--<!-- Page Heading -->--}}
        {{--<h1 class="mt-4 mb-3 text-dark">{{$dataPortfolioProject->name}}</h1>--}}
        <!-- Page Heading -->
    @include('includes.heading',['title'=>$dataPortfolioProject->name,'subtitle'=>null])

        <!-- Breadcrumb Component -->
    @include('includes.breadcrumbs',$dataBreadcrumb)

    <!-- Portfolio Item Row -->
        <div class="row mb-4">

            <div class="col-sm-12 col-md-12 col-lg-12">
                <img class="img-thumbnail img-fluid rounded p-0" src="{{asset($dataPortfolioProject->path_name.$dataPortfolioProject->image)}}" alt="Image Portfolio Project">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h3 class="my-3">Project Description</h3>
                <div class="card-text">{!! $dataPortfolioProject->description !!}</div>
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
            <div class="col-12">
                <h3 class="my-3">Table Information</h3>
                <div class="table-responsive">
                    <table class="table table-bordered rounded">
                        <thead>
                        <tr class="text-truncate bg-light">
                            <th>Tecnología</th>
                            <th>Porcentaje(%)</th>
                            <th>Frontend/Backend</th>
                            <th>Repositorio</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Laravel</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated w-45 bg-danger" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                </div>
                            </td>
                            <td>Backend</td>
                            <td>Github</td>
                        </tr>
                        <tr>
                            <td>Vuejs</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated w-20 bg-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
                                </div>
                            </td>
                            <td>Frontend</td>
                            <td>Github</td>
                        </tr>
                        <tr>
                            <td>Php7</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated w-35 bg-primary" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">35%</div>
                                </div>
                            </td>
                            <td>Backend</td>
                            <td>Github</td>
                        </tr>
                        <tr>
                            <td>Webpack</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated w-10 bg-warning {{19 < 10 ? 'text-dark' : ''}}" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100">2%</div>
                                </div>
                            </td>
                            <td>Backend</td>
                            <td>Github</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection