@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="pt-sm-2 pt-md-3 pt-lg-5 pb-sm-2 pb-md-3 pb-lg-5 w-100">
                <div class="col-sm-12 col-md-7 col-lg-5 mx-sm-auto mx-md-auto mx-auto">
                    {!! Form::open(['url'=>route('post.login'),'method'=>'post']) !!}
                        <div class="modal-content border-0">
                            <div class="modal-header border-0">
                                <h4 class="modal-title">Sign In</h4>
                            </div>
                            <div class="modal-body">

                                {{--<hr>--}}
                                <div class="form-group has-error">
                                    <label class="d-none d-lg-inline-block">Email</label>
{{--                                    {!! Form::text('email', old('email'), ['class' => 'form-control','placeholder'=>'Email','required']) !!}--}}
                                    <input title="email" name="email" type="email" class="form-control" placeholder="Email" required value="{{ old('email') }}">
                                    {{--<input name="email" ref="inputEmail" class="form-control" type="text" placeholder="Email" required>--}}
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
                                    {{--<span v-if="errors.email != undefined" class="help-block text-muted"><strong>{{errors.email[0]}}</strong></span>--}}
                                </div>
                                <div class="form-group">
                                    <label class="d-none d-lg-inline-block">Password</label>
                                    {{--<input name="password" ref="inputPassword" class="form-control" type="password" placeholder="Password" >--}}
{{--                                    {!! Form::text('password', old('password'), ['class' => 'form-control','placeholder'=>'Password','required']) !!}--}}
                                    <input title="contraseña" name="password" type="password" class="form-control"
                                           placeholder="Password" maxlength="16" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                    {{--<!--<span v-if="errors.password != undefined" class="help-block text-muted"><strong>{{errors.password[0]}}</strong></span>-->--}}
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-7 col-lg-7">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input name="rememberme" class="form-check-input" type="checkbox">
                                                    <span class="text-muted">Remember Password</span>
                                                </label>
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
                            <div class="modal-footer">
                                <template v-if="loading">
                                    <button type="button" class="btn btn-dark btn-block" disabled>Loading...</button>
                                </template>
                                <template v-else>
                                    <button type="submit" class="btn btn-dark btn-block btn-lg">Sign In</button>
                                </template>
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