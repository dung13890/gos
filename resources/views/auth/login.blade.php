@extends('layouts.app')

@section('content')
    <div id="login" class="animated @if (count($errors) > 0) jello @else fadeInDown @endif">
        <div class="login-heading">
            <h1 class="title">ĐĂNG NHẬP</h1>
        </div>

        <div class="login-content">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::open(['url' => URL::current(),'autocomplete'=>'off','class' => 'form-horizontal']) !!}
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon" id="username">
                                <i class="fa fa-user"></i>
                            </span>
                            <input name="username" type="text" class="form-control" placeholder="Username or Email" aria-describedby="username">
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon" id="password">
                                <i class="fa fa-lock"></i>
                            </span>
                            <input name="password" type="password" class="form-control" placeholder="Password" aria-describedby="password">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="checkbox">
                            <label for="rememberMe">
                                <input checked type="checkbox" id="rememberMe"> Duy trì đăng nhập?
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Đăng nhập</button>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>

        <div class="login-footer">
            <div class="text-center">
                <a href="password/email">Quên mật khẩu?</a>
            </div>
        </div>
    </div>
@endsection
