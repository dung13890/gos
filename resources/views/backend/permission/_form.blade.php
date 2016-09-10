<div id="newPermission" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Thêm mới quyền</h4>
            </div>
            <div class="modal-body">
                <form action="" class="form-horizontal" novalidate @submit.prevent="validate">
                    <validator name="validation">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="required-wrapper form-field">
                                    <small>Tên quyền</small>
                                    <input type='text' v-model='permission.name' 
                                        class='form-control input-sm'
                                        value=''
                                        v-validate:name="{
                                            required: {rule: true, message: 'Tên quyền không được để trống'},
                                            maxlength: {rule: 200, message: 'Không được quá 200 ký tự'}
                                        }"
                                    />
                                    <span class="error" v-if="$validation.name.errors && isError">
                                        @{{ $validation.name.errors[0].message }}
                                    </span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <small>Mô tả ngắn</small>
                                    <textarea class='form-control input-sm'
                                        v-model='permission.description'
                                        rows="5" 
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                        
                        @include('errors/validate')

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success" type="submit">
                                <span class="glyphicon glyphicon-floppy-disk"></span> Lưu lại
                            </button>

                            <button class="btn btn-warning" type="reset"><i class="glyphicon glyphicon-ban-circle"></i> Xóa</button>

                            <button type="button" class="btn btn-danger" data-dismiss="modal" >Hủy bỏ</button>
                        </div>
                    </validator>
                </form>
            </div>
        </div>
    </div>
</div>