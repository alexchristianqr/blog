@extends('layouts.app',['title'=>'Sign In'])
@section('content')
    <div id="app-container-login" class="container">
        <div class="row">
            <div class="pt-0 pb-0 w-100">
                <div class="col-sm-12 col-md-7 col-lg-5 mx-sm-auto mx-md-auto mx-auto pl-0 pr-0">
                    {!! Form::open(['url'=>route('post.login'),'method'=>'post','@submit'=>'doLogin()']) !!}
                    <div class="modal-content border-0">
                        <div class="modal-header border-0">
                            <h4 class="modal-title">Log In</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group has-error">
                                <label class="d-none d-lg-inline-block">Email</label>
                                <input v-model="vmusername" title="email" name="email" type="email" class="form-control" placeholder="Email" required value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <span class="text-danger">{!! $errors->first('email') !!}</span>
                                    </span>
                                @endif
                                @if ($errors->has('error_login'))
                                    <span class="help-block">
                                        <span class="text-danger">{!! $errors->first('error_login') !!}</span>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="d-none d-lg-inline-block">Password</label>
                                <div class="input-group">
                                    <template v-if="viewPwd">
                                        {!! Form::text('password','',['class'=>'form-control','placeholder'=>'Contraseña','maxlength'=>'16','required','v-model'=>'vmpassword']) !!}
                                    </template>
                                    <template v-else>
                                        {!! Form::password('password',['class'=>'form-control','placeholder'=>'Contraseña','maxlength'=>'16','required','v-model'=>'vmpassword']) !!}
                                    </template>
                                    <div class="input-group-append">
                                        <template v-if="!viewPwd">
                                            <button title="Ver Contraseña" type="button" class="btn btn-dark" @click="change">
                                                <i  class="fa fa-eye"></i>
                                            </button>
                                        </template>
                                        <template v-else>
                                            <button title="Ocultar Contraseña" type="button" class="btn btn-dark" @click="change">
                                                <i class="fa fa-eye-slash"></i>
                                            </button>
                                        </template>
                                    </div>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <span class="text-danger">{!! $errors->first('password') !!}</span>
                                    </span>
                                @endif
                            </div>
                           <div class="col-12">
                              <div class="row">
                                  <div class="row w-100">
                                      <div class="col-sm-12 col-md-7 col-lg-7">
                                          <div class="form-group">
                                              <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="chk1">
                                                  <label class="custom-control-label" for="chk1">Remember me</label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-sm-12 col-md-5 col-lg-5">
                                          <div hidden class="form-group-sm">
                                              <div class="text-sm-left text-md-right text-lg-right">
                                                  <a class="text-muted" href="http://blog.acqrdeveloper.com/password/reset"><i class="fa fa-unlock-alt fa-fw d-lg-none"></i>Forgot Password</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                               </div>
                            </div>
                        </div>
                        <div class="modal-footer border-top-0">
                            <template v-if="button.disabled">
                                <button type="button" :disabled="button.disabled" class="btn btn-dark btn-block btn-lg">Entering...</button>
                            </template>
                            <template v-else>
                                <button type="submit" class="btn btn-dark btn-block btn-lg">Enter</button>
                            </template>
                        </div>
                        <div class="col-12 my-auto text-center">
                            <a href="{{route('route.socialite.login',['facebook'])}}" title="Start with Facebook" class="btn btn-link text-facebook" style="min-width: 100px">
                                <i class="fa fa-facebook"></i>
                                <span class="text-center small">Facebook</span>
                            </a>
                            <a href="{{route('route.socialite.login',['google'])}}" title="Start with Google" class="btn btn-link text-danger" style="min-width: 100px">
                                <i class="fa fa-google"></i>
                                <span class="text-center small">Google</span>
                            </a>
                            <a href="{{route('route.socialite.login',['github'])}}" title="Start with Github" class="btn btn-link text-dark" style="min-width: 100px">
                                <i class="fa fa-github"></i>
                                <span class="text-center small">Github</span>
                            </a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script-js')
    <script type="text/javascript">
      new Vue({
        el: '#app-container-login',
        data: () => ({
          vmusername: '{{old('email')}}',
          vmpassword: '{{old('password')}}',
          viewPwd: false,//ver password
          button: {
            disabled: false,
          },
        }),
        mounted(){
          this.button.disabled = false
        },
        methods: {
          change(){
            if(this.vmpassword.length){
              return this.viewPwd = !this.viewPwd
            }else{
              if(this.viewPwd){
                return this.viewPwd = !this.viewPwd
              }else{
                return false
              }
            }
          },
          doLogin(){
            this.button.disabled = true
          },
        },
      })
    </script>
@endsection

