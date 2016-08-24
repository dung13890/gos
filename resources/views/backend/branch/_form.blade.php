<div id="newProvider" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Thêm mới chi nhánh</h4>
            </div>
            <div class="modal-body">
                <validator name="validation" :classes="{ touched: 'touched-validator', dirty: 'dirty-validator' }">
                    <form action="" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="required-wrapper form-field">
                                    <input type='text' v-model='room.code' 
                                        class='form-required input-sm'
                                        placeholder='Mã chi nhánh'
                                        value=''
                                        v-validate:code="{
                                            required: {rule: true, message: 'Mã nhóm khách hàng không được để trống'},
                                            maxlength: {rule: 11, message: 'Không được quá 11 ký tự'}
                                        }" />
                                    <span class="fa fa-exclamation"></span>
                                    <span class="error" v-if="$validation.name.errors">@{{ $validation.code.errors[0].message  }}</span>
                                    <span class="error">@{{ errors.code }}</span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <input type='text' v-model='room.manager'
                                        class='form-required input-sm'
                                        placeholder='Tên chi nhánh' value=''
                                        v-validate:name="{
                                            required: {rule: true, message: 'Tên chi nhánh không được bỏ trống'},
                                            maxlength: {rule: 50, message: 'Không được quá 50 ký tự'}
                                        }" />
                                    <span class="fa fa-exclamation"></span>
                                    <span class="error" v-if="$validation.manager.errors">@{{ $validation.manager.errors[0].message  }}</span>
                                    <span class="error">@{{ errors.manager }}</span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <input type='text' v-model='room.manager'
                                        class='form-required input-sm'
                                        placeholder='Địa chỉ' value='' />
                                    <span class="fa fa-exclamation"></span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <select v-model='room.branch_id'
                                        class="form-control input-sm"
                                        v-validate:user_id="{
                                            required: {rule: true, message: 'Vui lòng chọn chi nhánh'}
                                        }">
                                        
                                        <option value='' selected>--- Vùng áp dụng ---</option>
                                        <option value="1">Hà Nội</option>
                                        <option value="1">Hồ Chí Minh</option>
                                    
                                    </select>
                                    <span class="error" v-if="$validation.branch_id.errors">@{{ $validation.branch_id.errors[0].message }}</span>
                                    <span class="error">@{{ errors.branch_id }}</span>
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