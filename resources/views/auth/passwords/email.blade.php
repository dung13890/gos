@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div id="login" class="animated @if (count($errors) > 0) jello @else fadeInDown @endif">
    <div class="login-heading">
        <h1 class="title">Lấy lại mật khẩu</h1>
    </div>

    <div class="login-content">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Lỗi!</strong> Đã có lỗi xảy ra.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!! Form::open(['url' => url('/password/email'),'autocomplete'=>'off','class' => 'form-horizontal']) !!}
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon" id="username">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>

                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Nhận mật khẩu</button>
                    </div>
                </div>
            </div>

        {!! Form::close() !!}
    </div>
    <div class="login-footer">
    </div>
</div>

@endsection
