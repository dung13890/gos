<div id="newProvider" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Thêm mới nhóm hàng hóa</h4>
                </div>
                <div class="modal-body">
                    <validator name="validation" :classes="{ touched: 'touched-validator', dirty: 'dirty-validator' }">
                        <form action="" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="required-wrapper form-field">
                                        <input type='text' v-model='room.code' 
                                            class='form-required input-sm'
                                            placeholder='Mã nhóm hàng hóa'
                                            value=''
                                            v-validate:code="{
                                                required: {rule: true, message: 'Mã nhóm hàng hóa không được để trống'},
                                                maxlength: {rule: 11, message: 'Không được quá 11 ký tự'}
                                            }" />
                                        <span class="fa fa-exclamation"></span>
                                        <span class="error" v-if="$validation.name.errors">@{{ $validation.code.errors[0].message  }}</span>
                                        <span class="error">@{{ errors.code }}</span>
                                    </div>

                                    <div class="required-wrapper form-field">
                                        <input type='text' v-model='room.manager'
                                            class='form-required input-sm'
                                            placeholder='Tên nhóm hàng hóa' value=''
                                            v-validate:manager="{
                                                required: {rule: true, message: 'Tên nhóm hàng hóa không được bỏ trống'},
                                                maxlength: {rule: 50, message: 'Không được quá 50 ký tự'}
                                            }" />
                                        <span class="fa fa-exclamation"></span>
                                        <span class="error" v-if="$validation.manager.errors">@{{ $validation.manager.errors[0].message  }}</span>
                                        <span class="error">@{{ errors.manager }}</span>
                                    </div>

                                    <div class="required-wrapper form-field">
                                        <input type="text" v-model='room.member'
                                            class='form-control input-sm'
                                            placeholder="Giới hạn tồn tối thiểu"
                                            value="" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-success" type="button" v-on:click="submitForm">
                                    <span class="glyphicon glyphicon-floppy-disk"></span> Lưu
                                </button>

                                <button class="btn btn-info" type="button">
                                    <span class="glyphicon glyphicon-floppy-disk"></span> Lưu và thêm mới
                                </button>

                                <button class="btn btn-warning" type="reset"><i class="glyphicon glyphicon-ban-circle"></i> Clear</button>
                            </div>
                        </form>
                    </validator>
                </div>
            </div>
        </div>
    </div>