@extends('layouts.app')

@section('content')

<div id="login" class="animated @if (count($errors) > 0) jello @else fadeInDown @endif">
    <div class="login-heading">
        <h1 class="title">Thay đổi mật khẩu</h1>
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
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon" id="username">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <input id="email" type="email" class="form-control" name="email" placeholder="Email của bạn" value="{{ old('email') }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon" id="username">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input id="password" type="password" class="form-control" placeholder="Mật khẩu mới" name="password" value="{{ old('password') }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon" id="username">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input id="password-confirm" type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="password_confirmation" value="{{ old('password_confirmation') }}">
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs-12">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Thay đổi mật khẩu</button>
                        <a href="javascript:window.history.back()" class="btn btn-default" ><i class="fa fa-arrow-circle-left"></i> Trở lại</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <div class="login-footer">
    </div>
</div>
@endsection
