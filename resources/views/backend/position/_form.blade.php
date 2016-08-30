<div id="newProvider" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">@{{ modalTitle }}</h4>
            </div>
            <div class="modal-body">
                <validator name="validation" :classes="{ touched: 'touched-validator', dirty: 'dirty-validator' }">
                    <form action="" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="required-wrapper form-field">
                                    <small>Mã chức vụ</small>
                                    <input type='text' v-model='position.code'
                                        class='form-control input-sm'
                                        value=''
                                        v-validate:code="{
                                            required: {rule: true, message: 'Mã chức vụ không được bỏ trống'},
                                            maxlength: {rule: 11, message: 'Không được quá 11 ký tự'},
                                            minlength: {rule: 5, message: 'Không được nhỏ hơn 5 ký tự'}
                                        }"
                                    />
                                    <span class="error" v-if="$validation.code.errors">@{{ $validation.code.errors[0].message  }}</span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <small>Tên chức vụ</small>
                                    <input type='text' v-model='position.name'
                                        class='form-control input-sm'
                                        value=''
                                        v-validate:name="{
                                            required: {rule: true, message: 'Tên chức vụ không được bỏ trống'},
                                            maxlength: {rule: 200, message: 'Không được quá 200 ký tự'},
                                            minlength: {rule: 2, message: 'Không được quá 2 ký tự'},
                                        }"
                                    />
                                    <span class="error" v-if="$validation.name.errors">@{{ $validation.name.errors[0].message  }}</span>
                                </div>

                                @include('errors.validate')
                                
                            </div>
                        </div>
                        
                        <div class="form-group text-center">
                            <button class="btn btn-success" type="button" v-on:click="validate">
                                <span class="glyphicon glyphicon-floppy-disk"></span> Lưu lại
                            </button>

                            <button class="btn btn-warning" type="reset"><i class="glyphicon glyphicon-ban-circle"></i> Xóa dữ liệu</button>
                        </div>
                    </form>
                </validator>
            </div>
        </div>
    </div>
</div>