<template>
    <div id="passwordReset" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Đổi mật khẩu</h4>
                </div>
                
                <form class="form-horizontal" novalidate >
                    <div class="modal-body">
                        <validator name="validation">
                            <div class="form-group">
                                <label for="currentpassword" class="col-sm-3">Mật khẩu mới</label>
                                <div class="col-sm-9">
                                    <input type="password" v-model="item.old_password"
                                        class="form-control input-sm"
                                        v-validate:old_password="{
                                            required: {rule: true, message: 'Mật khẩu mới không được để trống'},
                                        }"
                                    />
                                    <span class="error" v-if="$validation.old_password.errors">
                                        {{ $validation.old_password.errors[0].message }}
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="newpassword" class="col-sm-3">Mật khẩu mới</label>
                                <div class="col-sm-9">
                                    <input type="password" v-model="item.password"
                                        class="form-control input-sm"
                                        v-validate:password="{
                                            required: {rule: true, message: 'Mật khẩu mới không được để trống'},
                                            minlength: {rule: 6, message: 'Mật khẩu không được nhỏ hơn 6 ký tự'},
                                        }"
                                    />
                                    <span class="error" v-if="$validation.password.errors">
                                        {{ $validation.password.errors[0].message }}
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-sm-3">Xác nhận lại</label>
                                <div class="col-sm-9">
                                    <input type="password" v-model="item.password_confirmation"
                                        class="form-control input-sm"
                                        v-validate:password_confirmation="{
                                            required: {rule: true, message: 'Mật khẩu mới không được để trống'},
                                            minlength: {rule: 6, message: 'Mật khẩu không được nhỏ hơn 6 ký tự'},
                                        }"
                                    />
                                    <span class="error" v-if="$validation.password_confirmation.errors">
                                        {{ $validation.password_confirmation.errors[0].message }}
                                    </span>
                                </div>
                            </div>
                        </validator>
                    </div>

                    <div v-show="errors.errors" class="alert alert-danger animated jello">
                        <ul>
                            <li v-for="error in errors.messages">{{ error }}</li>
                        </ul>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" v-on:click.prevent="postForm">Xác nhận</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy bỏ</button>
                    </div>
            </form>
            </div>
        </div>
    </div>
</template>

<script>
    var token = $('meta[name="csrf-token"]').attr('content');
    export default {
        props: {
            errors: {}
        },

        data: function () {
            return {
                item: {},
            }
        },

        methods: {
            postForm: function () {
                var self = this;
                this.$validate(true, function () {
                    if (self.$validation.invalid) {
                        return;
                    } else {
                        self.item._token = token;
                        self.$parent.changePassword(self.item);
                    }
                });
            }
        },

        ready: function () {
            this.$parent.formPassword = $('#passwordReset');
        }
    }
</script>