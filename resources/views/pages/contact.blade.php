@extends('layouts.app',['title'=>'Contact'])
@section('content')
   <!-- Page Content -->
   <div id="app-container-contact" class="container">

      <!-- Page Heading -->
   @include('includes.heading',['title'=>'Contact','subtitle'=>'Me'])

   <!-- Content Row -->
      <div class="row">
         <!-- Map Column -->
         <div class="col-lg-7">
            <!-- Embedded Google Map -->
            <div class="img-thumbnail mb-4">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d975.3635295895451!2d-77.04005707082787!3d-12.081032888062337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8f6af58045f%3A0xc8181b9694aedc55!2sJir%C3%B3n%20Almte.%20Martin%20Guisse%201564%2C%20Lince%2015073!5e0!3m2!1ses!2spe!4v1568524287311!5m2!1ses!2spe" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
         </div>
         <!-- Contact Details Column -->
         <div class="col-lg-5">
            <h2>Information of Contact</h2>
            <div class="table-responsive">
               <table class="table table-sm border-0">
                  <tbody>
                  <tr>
                     <td width="5%" class="text-center">
                        <i class="fa fa-map-marker"></i>
                     </td>
                     <td width="95%">
                        <span>Lima Peru</span>
                     </td>
                  </tr>
                  <tr>
                     <td width="auto" class="text-center">
                        <i class="fa fa-phone"></i>
                     </td>
                     <td width="auto">
                        <span><span class="text-secondary">(51) </span>955588297</span>
                     </td>
                  </tr>
                  <tr>
                     <td width="auto" class="text-center">
                        <i class="fa fa-envelope"></i>
                     </td>
                     <td width="auto">
                        <a href="mailto:acqrdeveloper@gmail.com">acqrdeveloper@gmail.com</a>
                     </td>
                  </tr>
                  <tr>
                     <td width="auto" class="text-center">
                        <i class="fa fa-github"></i>
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
                        <a href="https://web.facebook.com/alexchristianqr" target="_blank">https://web.facebook.com/alex_christian</a>
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
      </div>
      <!-- /.row -->
      <!-- Contact Form -->
      <h2>Message</h2>
      {!! Form::open(['url'=>route('route.contact.sendmessage'),'method'=>'post','@submit'=>'sendMailContact()']) !!}
      <div class="row">
         <div class="col-md-7 col-lg-4">
            <div class="form-group">
               <label>Full Name</label>
               <input title="Ingrese su nombre completo" name="fullname" type="text" class="form-control bg-light"
                      placeholder="Nombre completo" required value="{{ old('fullname') }}" :readonly="button.disabled">
            </div>
         </div>
         <div class="col-md-5 col-lg-3">
            <div class="form-group">
               <label>Phone Number</label>
               <input title="Ingrese su numero de telefono" name="phone" type="tel" class="form-control bg-light"
                      placeholder="Telefono" required value="{{ old('phone') }}" :readonly="button.disabled">
            </div>
         </div>
         <div class="col-lg-5">
            <div class="form-group">
               <label>Email</label>
               <input title="Ingrese su correo electronico" name="email" type="email" class="form-control bg-light"
                      placeholder="Correo electronico" required value="{{ old('email') }}" :readonly="button.disabled">
            </div>
         </div>
         <div class="col-lg-12 mb-4">
            <div class="form-group">
               <label>Message</label>
               <textarea title="Ingrese contenido del mensaje" placeholder="Contenido del mensaje" name="message" rows="4" cols="100"
                         class="form-control bg-light" required maxlength="999" style="resize:none"
                         :readonly="button.disabled">{{ old('message') }}</textarea>
            </div>
            <!-- For success/fail messages -->
            <button :disabled="button.disabled" title="Enviar mensaje de contacto" type="submit" class="btn btn-primary">@{{ (button.disabled) ? 'Sending...' : 'Send Message' }}</button>
         </div>
      </div>
   {!! Form::close() !!}
   <!-- /.row -->

   </div>
   <!-- /.container -->
@endsection
@section('script-js')
   <script type="text/javascript">
     new Vue({
       el:'#app-container-contact',
       data:()=>({
         button:{
           disabled:false
         }
       }),
       mounted(){
         this.button.disabled = false
       },
       methods:{
         sendMailContact(){
           this.button.disabled = true
         },
       },
     })
   </script>
@endsection