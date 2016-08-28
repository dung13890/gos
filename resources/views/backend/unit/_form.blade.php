<div id="newUnit" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">@{{ modalTitle }}</h4>
            </div>
            <div class="modal-body">
                <validator name="validation" :classes="{ touched: 'touched-validator', dirty: 'dirty-validator' }">
                    <div class="form-group">
                        <div class="required-wrapper">
                            <small>Tên đơn vị tính</small>
                            <input type='text' v-model='unit.name'
                                class='form-control input-sm'
                                v-validate:name="{
                                    required: {rule: true, message: 'Tên không được bỏ trống'},
                                    maxlength: {rule: 50, message: 'Không được quá 50 ký tự'},
                                    minlength: {rule: 2, message: 'Không được nhỏ hơn 2 ký tự'},
                                }"
                            />
                            <span class="error" v-if="$validation.name.errors">@{{ $validation.name.errors[0].message  }}</span>
                        </div>

                        <div class="required-wrapper">
                            <small>Ký hiệu (nếu có)</small>
                            <input type='text' v-model='unit.short_name'
                                class='form-control input-sm'
                            />
                        </div>

                        <div class="required-wrapper">
                            <small>Thông tin mô tả</small>
                            <textarea class="form-control input-sm" rows="3" name="description" cols="50"></textarea>
                        </div>
                    </div>
                
                    <div class="form-group text-center">
                        <button class="btn btn-success" type="submit">
                            <span class="glyphicon glyphicon-floppy-disk"></span> Lưu lại
                        </button>
                        <button class="btn btn-warning" type="reset"><i class="glyphicon glyphicon-ban-circle"></i> Xóa dữ liệu</button>
                    </div>
                </validator>
            </div>
        </div>
    </div>
</div>