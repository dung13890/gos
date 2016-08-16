@if (count($errors) > 0)
    <div class="alert alert-danger animated @if (count($errors) > 0) jello @else fadeInUp @endif">
        <strong>Lỗi!</strong> Đã có lỗi sảy ra.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    {{ Form::text('username',null, ['class' => 'form-control', 'placeholder' => 'Tên đăng nhập (*)']) }}
</div>

<div class="form-group">
	{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mật khẩu']) }}	
</div>

<div class="form-group">
    {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Xác nhận mật khẩu']) }}
</div>

<div class="form-group">
    {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Địa chỉ email (*)']) }}
</div>

<div class="form-group">
    {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Số điện thoại (*)']) }}
</div>

<div class="form-group">
    {{ Form::date('birthday', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    <label class="radio-inline">{!! Form::radio('gender', 1 ) !!}  Nam</label>
    <label class="radio-inline">{!! Form::radio('gender', 2 ) !!}  Nữ</label>
</div>

<div class="form-group text-center">
    <button class="btn btn-info" type="submit">
        <span class="glyphicon glyphicon-floppy-disk"></span> Lưu và thêm mới
    </button>
    <a href="javascript:window.history.back()" class="btn btn-warning" ><i class="glyphicon glyphicon-ban-circle"></i> Bỏ qua</a>
</div>