@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        @include('components.heading',['title'=>'Contact','subtitle'=>'Me'])
        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-lg-8 mb-4">
                <!-- Embedded Google Map -->
                <div class="img-thumbnail">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d11037.937429190797!2d-76.87214814438667!3d-12.009040248544826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2spe!4v1531198887708" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <!-- Contact Details Column -->
            <div class="col-lg-4 mb-4">
                <h3>Contact Details</h3>
                <p>
                    3481 Melrose Place
                    <br>Beverly Hills, CA 90210
                    <br>
                </p>
                <p>
                    <abbr title="Phone"><i class="fa fa-phone"></i></abbr> (123) 456-7890
                </p>
                <p>
                    <abbr title="Email"><i class="fa fa-envelope-o"></i></abbr>
                    <a href="mailto:name@example.com">aquispe.developer@gmail.com
                    </a>
                </p>
                <p>
                    <abbr title="Hours"><i class="fa fa-calendar"></i></abbr> Monday - Friday: 9:00 AM to 5:00 PM
                </p>
            </div>
        </div>
        <!-- /.row --><!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">
            <div class="col-lg-8 mb-4">
                <h3>Send us a Message</h3>
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Full Name:</label>
                            <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Phone Number:</label>
                            <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email Address:</label>
                            <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Message:</label>
                            <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
                </form>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection