<div id="passwordReset" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Đổi mật khẩu</h4>
            </div>
            
            <form class="form-horizontal" novalidate @submit.prevent="validate">
                <div class="modal-body">
                    <validator name="validation">
                        <input type="hidden" v-model='user.id'
                            value="{{ $currentUser->id }}" 
                            disabled="true"
                            class="form-control input-sm"
                        />

                        <div class="form-group">
                            <label for="currentpassword" class="col-sm-3">Mật khẩu mới</label>
                            <div class="col-sm-9">
                                <input type="password" v-model="user.old_password"
                                    class="form-control input-sm"
                                    v-validate:old_password="{
                                        required: {rule: true, message: 'Mật khẩu mới không được để trống'},
                                    }"
                                />
                                <span class="error" v-if="$validation.old_password.errors && isError">
                                    @{{ $validation.old_password.errors[0].message }}
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="newpassword" class="col-sm-3">Mật khẩu mới</label>
                            <div class="col-sm-9">
                                <input type="password" v-model="user.password"
                                    class="form-control input-sm"
                                    v-validate:password="{
                                        required: {rule: true, message: 'Mật khẩu mới không được để trống'},
                                        minlength: {rule: 6, message: 'Mật khẩu không được nhỏ hơn 6 ký tự'},
                                    }"
                                />
                                <span class="error" v-if="$validation.password.errors && isError">
                                    @{{ $validation.password.errors[0].message }}
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-3">Xác nhận lại</label>
                            <div class="col-sm-9">
                                <input type="password" v-model="user.password_confirmation"
                                    class="form-control input-sm"
                                    v-validate:password_confirmation="{
                                        required: {rule: true, message: 'Mật khẩu mới không được để trống'},
                                        minlength: {rule: 6, message: 'Mật khẩu không được nhỏ hơn 6 ký tự'},
                                    }"
                                />
                                <span class="error" v-if="$validation.password_confirmation.errors && isError">
                                    @{{ $validation.password_confirmation.errors[0].message }}
                                </span>
                            </div>
                        </div>
                    </validator>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Xác nhận</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy bỏ</button>
                </div>
        </div>
    </div>
</div>
