@extends('layouts.app',['title'=>'New Account'])
@section('content')
    <div id="app-container-register" class="container">
        <div class="row">
            <div class="pt-0 pb-0 w-100">
                <div class="col-sm-12 col-md-7 col-lg-6 mx-sm-auto mx-md-auto mx-auto">
                    {!! Form::open(['url'=>route('post.register'),'method'=>'post','@submit'=>'doRegister()']) !!}
                    <div class="modal-content border-0">
                        <div class="modal-header border-0">
                            <h4 class="modal-title">Sign Up</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="d-none d-lg-inline-block">Nombre</label>
                                        <input title="name" name="fullname" type="text" class="form-control" placeholder="Full name" required value="{{ old('fullname') }}">
                                        @if ($errors->has('fullname'))
                                            <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('fullname') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="d-none d-lg-inline-block">Email</label>
                                        <input title="email" name="email" type="email" class="form-control" placeholder="Email" required value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="d-none d-lg-inline-block">Password</label>
                                        <div class="input-group">
                                            <template v-if="viewPwd">
                                                <input title="contraseña" name="password" type="text" class="form-control" placeholder="Password" maxlength="16" required>
                                            </template>
                                            <template v-else>
                                                <input title="contraseña" name="password" type="password" class="form-control" placeholder="Password" maxlength="16" required>
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
                                            <strong class="text-danger">{!! $errors->first('password') !!}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="d-none d-lg-inline-block">Confirm Password</label>
                                        <div class="input-group">
                                            <template v-if="viewPwdTwo">
                                                <input title="contraseña" name="password_confirmation" type="text" class="form-control" placeholder="Password" maxlength="16" required>
                                            </template>
                                            <template v-else>
                                                <input title="contraseña" name="password_confirmation" type="password" class="form-control" placeholder="Password" maxlength="16" required>
                                            </template>
                                            <div class="input-group-append">
                                                <template v-if="!viewPwdTwo">
                                                    <button title="Ver Contraseña" type="button" class="btn btn-dark" @click="changeTwo">
                                                        <i  class="fa fa-eye"></i>
                                                    </button>
                                                </template>
                                                <template v-else>
                                                    <button title="Ocultar Contraseña" type="button" class="btn btn-dark" @click="changeTwo">
                                                        <i class="fa fa-eye-slash"></i>
                                                    </button>
                                                </template>
                                            </div>
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                            <strong class="text-danger">{!! $errors->first('password') !!}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-top-0">
                            <template v-if="button.disabled">
                                <button type="button" :disabled="button.disabled" class="btn btn-dark btn-block btn-lg">Creating user...</button>
                            </template>
                            <template v-else>
                                <button type="submit" class="btn btn-dark btn-block btn-lg">Create</button>
                            </template>
                        </div>
                        <div hidden class="form-group text-center">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button title="Start with Facebook" type="submit" class="btn btn-outline-facebook btn-lg"><i class="fa fa-facebook-square fa-2x"></i></button>
                                <button title="Start with Google" type="submit" class="btn btn-outline-danger btn-lg"><i class="fa fa-google-plus-square fa-2x"></i></button>
                                <button title="Start with Github" type="submit" class="btn btn-outline-dark btn-lg"><i class="fa fa-github-square fa-2x"></i></button>
                            </div>
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
        el: '#app-container-register',
        data:()=>({
          viewPwd: false,//ver password
          viewPwdTwo: false,//ver password de confirmacion
          button:{
            disabled:false
          }
        }),
        mounted(){
          this.button.disabled = false
        },
        methods:{
          doRegister(){
            this.button.disabled = true
          },
          change(){
            this.viewPwd = !this.viewPwd
          },
          changeTwo(){
            this.viewPwdTwo = !this.viewPwdTwo
          },
        },
      })
    </script>
@endsection

