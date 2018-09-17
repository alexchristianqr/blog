@extends('layouts.app',['title'=>'Contact'])
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
    @include('includes.heading',['title'=>'Contact','subtitle'=>'Me'])
    <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-lg-7">
                <!-- Embedded Google Map -->
                <div class="img-thumbnail mb-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d11037.937429190797!2d-76.87214814438667!3d-12.009040248544826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2spe!4v1531198887708" width="100%" height="275" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <!-- Contact Details Column -->
            <div class="col-lg-5">
                <h2>Contact Details</h2>
                <table class="table table-sm border-0">
                    <tbody>
                    <tr>
                        <td width="5%" class="text-center">
                            <i class="fa fa-map-marker"></i>
                        </td>
                        <td width="95%">
                            <span>Av. San Juan de Pariachi Carretera Central Km8 Ate Vitarte Lima Peru</span>
                        </td>
                    </tr>
                    <tr>
                        <td width="auto" class="text-center">
                            <i class="fa fa-phone-square"></i>
                        </td>
                        <td width="auto">
                            <span><span class="text-secondary">(+51)</span>955588297 / <span class="text-secondary">(01)</span>7237503</span>
                        </td>
                    </tr>
                    <tr>
                        <td width="auto" class="text-center">
                            <i class="fa fa-envelope"></i>
                        </td>
                        <td width="auto">
                            <a href="mailto:name@example.com">aquispe.developer@gmail.com</a>
                        </td>
                    </tr>
                    <tr>
                        <td width="auto" class="text-center">
                            <i class="fa fa-github-square"></i>
                        </td>
                        <td width="auto">
                            <a href="https://github.com/acqrdeveloper" target="_blank">https://github.com/acqrdeveloper</a>
                        </td>
                    </tr>
                    <tr>
                        <td width="auto" class="text-center">
                            <i class="fa fa-facebook-square"></i>
                        </td>
                        <td width="auto">
                            <a href="https://web.facebook.com/alexchristianqr" target="_blank">https://web.facebook.com/alexchristianqr</a>
                        </td>
                    </tr>
                    <tr>
                        <td width="auto" class="text-center">
                            <i class="fa fa-calendar"></i>
                        </td>
                        <td width="auto">
                            <span>Lunes a Viernes 09:00 - 17:00</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
        <!-- Contact Form -->
        <h2>Send Message</h2>
        <form>
            <div class="row">
            <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control bg-light" required>
                    </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="tel" class="form-control bg-default" required>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control bg-default" required>
                </div>
            </div>
            <div class="col-lg-12 mb-4">
                <div class="form-group">
                    <label>Message</label>
                    <textarea rows="4" cols="100" class="form-control bg-default" required maxlength="999" style="resize:none"></textarea>
                </div>
                <!-- For success/fail messages -->
                <button type="submit" class="btn btn-primary">Send Message</button>
            </div>
        </div>
        </form>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection