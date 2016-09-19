<div id="newGroupCustomer" class="modal fade">
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
                                    <small>Mã</small>
                                    <input type='text' v-model='customer_group.code' 
                                        class='form-control input-sm'
                                        value=''
                                        v-validate:code="{
                                            required: {rule: true, message: 'Mã nhóm được để trống'},
                                            maxlength: {rule: 11, message: 'Mã nhóm không được quá 11 ký tự'}
                                        }" />

                                    <span class="error" v-if="$validation.code.errors && isError">
                                        @{{ $validation.code.errors[0].message }}
                                    </span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <small>Tên nhóm</small>
                                    <input type='text' v-model='customer_group.name'
                                        class='form-control input-sm'
                                        v-validate:name="{
                                            required: {rule: true, message: 'Tên nhóm không được bỏ trống'},
                                            maxlength: {rule: 50, message: 'Tên nhóm không được quá 50 ký tự'}
                                        }" />

                                    <span class="error" v-if="$validation.name.errors && isError">
                                        @{{ $validation.name.errors[0].message }}
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