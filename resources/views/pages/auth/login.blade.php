@extends('layouts.app',['title'=>'Sign In'])
@section('content')
    <div id="app-container-login" class="container">
        <div class="row">
            <div class="pt-0 pb-0 w-100">
                <div class="col-sm-12 col-md-7 col-lg-5 mx-sm-auto mx-md-auto mx-auto">
                    {!! Form::open(['url'=>route('post.login'),'method'=>'post']) !!}
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
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                @endif
                                @if ($errors->has('error_login'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('error_login') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="d-none d-lg-inline-block">Password</label>
                                <div class="input-group">
                                    <template v-if="viewPwd">
                                        {!! Form::text('password','',['class'=>'form-control','placeholder'=>'Password','maxlength'=>'16','required','v-model'=>'vmpassword']) !!}
                                    </template>
                                    <template v-else>
                                        {!! Form::password('password',['class'=>'form-control','placeholder'=>'Password','maxlength'=>'16','required','v-model'=>'vmpassword']) !!}
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
                            <div class="row">
                                <div class="col-sm-12 col-md-7 col-lg-7">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="chk1">
                                            <label class="custom-control-label" for="chk1">Remember me</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5 col-lg-5">
                                    <div class="form-group-sm">
                                        <div class="text-sm-left text-md-right text-lg-right">
                                            <a class="text-muted" href="http://blog.acqrdeveloper.com/password/reset">
                                                <i class="fa fa-unlock-alt fa-fw d-lg-none"></i>Forgot Password</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-top-0">
                            <button type="submit" class="btn btn-dark btn-block btn-lg">Enter</button>
                        </div>
                        <div class="form-group text-center">
                                <a href="{{route('route.socialite.login',['facebook'])}}" title="Start with Facebook" class="text-facebook"><i class="fa fa-facebook-square fa-3x"></i></a>
                                <a href="{{route('route.socialite.login',['google'])}}" title="Start with Google" class="btn btn-outline-danger btn-lg border-0 rounded"><i class="fa fa-google-plus-square fa-2x"></i></a>
                                <a href="{{route('route.socialite.login',['github'])}}" title="Start with Github" class="text-dark"><i class="fa fa-github-square fa-3x"></i></a>
                            {{--</div>--}}
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
       new  Vue({
            el:'#app-container-login',
            data:()=>({
                vmusername:'{{old('email')}}',
                vmpassword:'{{old('password')}}',
                viewPwd: false//ver password
            }),
            methods:{
                change(){
                    if(this.vmpassword.length) {
                        return this.viewPwd = !this.viewPwd
                    }else{
                        if(this.viewPwd){
                            return this.viewPwd = !this.viewPwd
                        }else{
                            return false
                        }
                    }
                }
            }
        })
    </script>
@endsection

