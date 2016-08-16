@extends('layouts.app')

@section('content')
<div id="login" class="animated @if (count($errors) > 0) jello @else fadeInDown @endif">
    <div class="login-heading">
        <h1 class="title">ĐĂNG NHẬP</h1>
    </div>

    <div class="login-content">
        <p class="login-box-msg">Đăng nhập hệ thống</p>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
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
                        <input type="text" class="form-control" placeholder="Tài khoản" aria-describedby="username">
                    </div>

                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon" id="password">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Mật khẩu" aria-describedby="password">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="checkbox">
                        <label for="rememberMe">
                            <input type="checkbox" id="rememberMe"> Duy trì đăng nhập?
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Đăng nhập</button>
                        <a href="#" class="btn btn-default">HỦY BỎ</a>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>

    <div class="login-footer">
        <div class="text-center">
            <a href="#">Quên mật khẩu?</a>
        </div>
    </div>
</div>
@endsection
