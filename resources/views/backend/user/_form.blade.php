@if (count($errors) > 0)
    <div class="alert alert-danger animated @if (count($errors) > 0) jello @else fadeInUp @endif">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <div class="required-wrapper">
        {{ Form::text('fullname',null, ['class' => 'form-required input-sm', 'placeholder' => 'Tên đầy đủ']) }}
        <span class="fa fa-exclamation"></span>
    </div>
</div>

<div class="form-group">
    <div class="required-wrapper">
        {{ Form::text('username',null, ['class' => 'form-required input-sm', 'placeholder' => 'Tên đăng nhập']) }}
        <span class="fa fa-exclamation"></span>
    </div>
</div>

<div class="form-group">
    <div class="required-wrapper">
       {{ Form::password('password', ['class' => 'form-required input-sm', 'placeholder' => 'Mật khẩu']) }}
       <span class="fa fa-exclamation"></span>
    </div>
</div>

<div class="form-group">
    <div class="required-wrapper">
        {{ Form::password('password_confirmation', ['class' => 'form-required input-sm', 'placeholder' => 'Xác nhận mật khẩu']) }}
        <span class="fa fa-exclamation"></span>
    </div>
</div>

<div class="form-group">
    <div class="required-wrapper">
        {{ Form::email('email', null, ['class' => 'form-required input-sm', 'placeholder' => 'Địa chỉ email']) }}
        <span class="fa fa-exclamation"></span>
    </div>
</div>

<div class="form-group">
    {{ Form::text('phone', null, ['class' => 'form-control input-sm', 'placeholder' => 'Số điện thoại']) }}
</div>

<div class="form-group">
    {{ Form::text('address', null, ['class' => 'form-control input-sm', 'placeholder' => 'Địa chỉ ']) }}
</div>

<div class="form-group">
    {{ Form::text('birthday', null, ['class' => 'form-control input-sm input-datepicker', 'placeholder' => 'Sinh nhật ( dd/mm/YYYY ) ']) }}
</div>

<div class="form-group">
    <label class="radio-inline">{{ Form::radio('gender', 1, true ) }}  Nam</label>
    <label class="radio-inline">{{ Form::radio('gender', 2 ) }}  Nữ</label>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-4">
            <div class="fileinput fileinput-new"  data-provides="fileinput">
                <div class="thumbnail fileinput-preview" data-trigger="fileinput">
                    {!! HTML::image( (isset($item) && $item->image )? route('image',$item->image_thumbnail) :  asset('assets/img/noavatar.png'),'') !!}
                </div>
                <div>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Xóa</a>
                    <div class="btn btn-default btn-file">
                        <span class="fileinput-new">Chọn</span>
                        <span class="fileinput-exists"><i class="fa fa-refresh"></i></span>
                        {{ Form::file('image') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            {{ Form::select('branch_id', $listBrands, null, ['class' => 'form-control input-sm']) }}
            <br>
            {{ Form::select('room_id', $listRooms, null, ['class' => 'form-control input-sm']) }}
            <br>
            {{ Form::select('room_id', $listRooms, null, ['class' => 'form-control input-sm']) }}
        </div>
    </div>
</div>

<div class="form-group text-center">
    <button class="btn btn-info" type="submit">
        <span class="glyphicon glyphicon-floppy-disk"></span> Lưu và {{ $button }}
    </button>
    <a href="javascript:window.history.back()" class="btn btn-warning" ><i class="glyphicon glyphicon-ban-circle"></i> Bỏ qua</a>
</div>