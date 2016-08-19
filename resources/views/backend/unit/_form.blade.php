<div id="newUnit" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Thêm mới đơn vị tính</h4>
            </div>
            <div class="modal-body">
                {{  Form::open(['route' => 'units.store', 'class' => 'form-horizontal']) }}
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="required-wrapper">
                                {{ Form::text('name', null, ['class' => 'form-required input-sm', 'placeholder' => 'Tên đơn vị tính']) }}
                                <span class="fa fa-exclamation"></span>
                                @if ($errors->has('name')) <small class="help-block error">{{ $errors->first('name') }}</small> @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-xs-12">
                            {{ Form::text('short_name', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ký hiệu (nếu có)']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            {{ Form::textarea('description', null, ['class' => 'form-control input-sm', 'rows' => '3', 'placeholder' => 'Mô tả']) }}
                        </div>
                    </div>
                    
                    <div class="form-group text-center">
                        <button class="btn btn-success" type="submit">
                            <span class="glyphicon glyphicon-floppy-disk"></span> Lưu
                        </button>

                        <button class="btn btn-info" type="submit">
                            <span class="glyphicon glyphicon-floppy-disk"></span> Lưu và thêm mới
                        </button>

                        <button class="btn btn-warning" type="reset"><i class="glyphicon glyphicon-ban-circle"></i> Clear</button>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>