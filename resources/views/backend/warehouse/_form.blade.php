<div id="newWarehouse" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button"
                    v-on:click="create()"
                    class="close" data-dismiss="modal"
                    aria-hidden="true">&times;
                </button>
                <h4 class="modal-title">@{{ modalTitle }}</h4>
            </div>
            <div class="modal-body">
                <form action="" class="form-horizontal">
                    <validator name="validation">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="required-wrapper form-field">
                                    <small>Mã kho hàng</small>
                                    <input type='text' v-model='warehouse.code' 
                                        class='form-control input-sm'
                                        value=''
                                        v-validate:code="{
                                            required: {rule: true, message: 'Mã kho hàng không được để trống'},
                                            maxlength: {rule: 11, message: 'Mã kho hàng không được quá 11 ký tự'}
                                        }" />

                                    <span class="error" v-if="$validation.code.errors && isError">
                                        @{{ $validation.code.errors[0].message }}
                                    </span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <small>Tên kho hàng</small>
                                    <input type='text' v-model='warehouse.name'
                                        class='form-control input-sm'
                                        v-validate:name="{
                                            required: {rule: true, message: 'Tên kho hàng không được bỏ trống'},
                                            maxlength: {rule: 50, message: 'Tên kho hàng không được quá 50 ký tự'}
                                        }" />

                                    <span class="error" v-if="$validation.name.errors && isError">
                                        @{{ $validation.name.errors[0].message }}
                                    </span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <small>Chủ kho</small>
                                    <select v-model='warehouse.user_id'
                                        class="form-control input-sm"
                                        v-validate:user_id="{
                                            required: {rule: true, message: 'Chủ kho không được bỏ trống'}
                                        }">
                                        <option value=""></option>
                                        <option v-for="user in users"
                                            class="form-control" 
                                            :value="user.id">@{{ user.fullname }}
                                        </option>
                                    </select>

                                    <span class="error" v-if="$validation.user_id.errors && isError">
                                        @{{ $validation.user_id.errors[0].message }}
                                    </span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <small>Chi nhánh</small>
                                    <select v-model='warehouse.branch_id'
                                        class="form-control input-sm"
                                        v-validate:branch_id="{
                                            required: {rule: true, message: 'Vui lòng chọn chi nhánh'}
                                        }">
                                        <option value=""></option>
                                        <option v-for="branch in branches"
                                            class="form-control" 
                                            :value="branch.id">@{{ branch.name }}
                                        </option>
                                    </select>
                                    <span class="error" v-if="$validation.branch_id.errors && isError">
                                        @{{ $validation.branch_id.errors[0].message }}
                                    </span>
                                </div>

                                <div v-show="errors.errors" class="alert alert-danger animated jello">
                                    <ul>
                                        <li v-for="error in errors.messages">@{{ error }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-success" type="button" v-on:click="validate()">
                                <span class="glyphicon glyphicon-floppy-disk"></span> Lưu lại
                            </button>

                            <button class="btn btn-warning" type="reset">
                                <span class="glyphicon glyphicon-ban-circle"></span> Xóa
                            </button>

                            <button type="button" class="btn btn-danger" data-dismiss="modal" >Hủy bỏ</button>
                        </div>
                    </validator>
                </form>
            </div>
        </div>
    </div>
</div>