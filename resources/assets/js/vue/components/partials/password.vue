<template>
    <div id="password" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">ĐỔI MẬT KHẨU</h4>
                </div>
                <div class="modal-body">
                    <validator name="validation" :classes="{ touched: 'touched-validator', dirty: 'dirty-validator' }">
                        <form class="form-horizontal">
                            <div v-if="isError" class="alert alert-danger animated jello">
                                <ul>
                                    <li v-for="error in errors">{{ error }}</li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-3">Mật khẩu cũ</label>
                                <div class="col-sm-9">
                                    <input type="password" v-validate:old_password="rules" v-model="value.old_password" class="form-control"/>
                                    <span class="error" v-if="$validation.old_password.errors">{{ $validation.old_password.errors[0].message  }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-3">Mật khẩu mới</label>
                                <div class="col-sm-9">
                                    <input type="password" v-validate:password="rules" v-model="value.password" class="form-control"/>
                                    <span class="error" v-if="$validation.password.errors">{{ $validation.password.errors[0].message  }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-3">Xác nhận MK</label>
                                <div class="col-sm-9">
                                    <input type="password" v-validate:password_confirmation="rules" v-model="value.password_confirmation" class="form-control"/>
                                    <span class="error" v-if="$validation.password_confirmation.errors">{{ $validation.password_confirmation.errors[0].message  }}</span>
                                </div>
                            </div>
                        </form>
                    </validator>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
                    <button type="button" v-on:click="postForm" class="btn btn-primary">Xác nhận</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    var token = $('meta[name="csrf-token"]').attr('content')
    export default {
        data: function () {
            return {
                rules: {
                    required: {
                        rule: true,
                        message: 'Không được trống.'
                    },
                    minlength: {
                        rule: 6,
                        message: 'Nhập từ 6 ký tự trở lên.'
                    },
                    maxlength: {
                        rule: 40,
                        message: 'Không được nhiều hơn 40 ký tự.'
                    }
                },
                value: {},
                errors: {},
                isError: false,
            }
        },
        methods: {
            postForm:function () {
                var self = this;
                var formData = new FormData();
                formData.append('_token', token);
                this.$validate(true, function () {
                    if (self.$validation.invalid) {
                        return;
                    }

                    formData.append('old_password', self.value.old_password);
                    formData.append('password', self.value.password);
                    formData.append('password_confirmation', self.value.password_confirmation);
                    self.$parent.UserService.updatePassword(formData).then((response) => {
                        if (response.code === 0) {
                            toastr.success(response.message)
                            $('#password').modal('hide');
                        } else {
                            toastr.error(response.message)
                        }
                    }, (errors) => {
                        if (errors.errors) {
                            self.isError = true;
                            self.errors = errors.errors;
                        }
                    });
                });
            }
        }
    }
</script>
<style>
    
</style>