@extends('layouts.app',['title'=>'New Account'])
@section('content')
    <div id="app-container-register" class="container">
        <div class="row">
            <div class="pt-0 pb-0 w-100">
                <div class="col-sm-12 col-md-7 col-lg-6 mx-sm-auto mx-md-auto mx-auto">
                    {!! Form::open(['url'=>route('post.login'),'method'=>'post']) !!}
                    <div class="modal-content border-0">
                        <div class="modal-header border-0">
                            <h4 class="modal-title">Register Account</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="d-none d-lg-inline-block">Full Name</label>
                                        <input title="name" name="full_name" type="text" class="form-control" placeholder="Full name" required value="{{ old('full_name') }}">
                                        @if ($errors->has('full_name'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('full_name') }}</strong>
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
                                                <strong>{{ $errors->first('email') }}</strong>
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
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="d-none d-lg-inline-block">Confirm Password</label>
                                        <div class="input-group">
                                            <template v-if="viewPwdTwo">
                                                <input title="contraseña" name="password" type="text" class="form-control" placeholder="Password" maxlength="16" required>
                                            </template>
                                            <template v-else>
                                                <input title="contraseña" name="password" type="password" class="form-control" placeholder="Password" maxlength="16" required>
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
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-top-0">
                            <button type="submit" class="btn btn-dark btn-block btn-lg">Register</button>
                        </div>
                        <div class="form-group text-center">
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
            el:'#app-container-register',
            data:()=>({
                viewPwd: false,//ver password
                viewPwdTwo: false//ver password de confirmacion
            }),
            methods:{
                change(){
                   this.viewPwd = !this.viewPwd
                },
                changeTwo(){
                    this.viewPwdTwo = !this.viewPwdTwo
                }
            }
        });
    </script>
@endsection

