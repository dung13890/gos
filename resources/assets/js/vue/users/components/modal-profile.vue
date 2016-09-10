<template>
    <div id="newProfile" class="modal fade">
    {{ userProfile }}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Thông tin tài khoản</h4>
                </div>

                <form class="form-horizontal">
                    <div class="modal-body">
                        <validator name="validation">
                            <input type="hidden" v-model='userProfile.id'
                                disabled="true"
                                class="form-control input-sm"
                            />

                            <div class="form-group">
                                <label for="username" class="col-sm-3">Tài khoản</label>
                                <div class="col-sm-9">
                                    <input type="text" v-model='userProfile.username'
                                        disabled="true"
                                        class="form-control input-sm" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-3">Email</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        v-model='userProfile.email'
                                        disabled="true" 
                                        class="form-control input-sm" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="fullname" class="col-sm-3">Họ và tên</label>
                                <div class="col-sm-9">
                                    <input type="text" v-model='userProfile.fullname'
                                        class="form-control input-sm"
                                        v-validate:fullname="{
                                            required: {rule: true, message: 'Họ và tên không được để trống'},
                                        }"
                                    />
                                    <span class="error" v-if="$validation.fullname.errors">
                                        {{ $validation.fullname.errors[0].message }}
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3">Giới tính</label>
                                <div class="col-sm-9">
                                    <label class="radio-inline">
                                        <input type="radio" v-model='userProfile.gender'
                                            value='1'
                                            name="gender"
                                        />  Nam
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" v-model='userProfile.gender'
                                            value='2'
                                            name="gender"
                                        /> Nữ
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="phone" class="col-sm-3">Điện thoại</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        v-model='userProfile.phone'
                                        class="form-control input-sm"
                                        v-validate:phone="{
                                            required: {rule: true, message: 'Số điện thoại không được để trống'},
                                        }"
                                    />
                                    <span class="error" v-if="$validation.phone.errorsor">
                                        {{ $validation.phone.errors[0].message }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="address" class="col-sm-3">Địa chỉ</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        v-model='userProfile.address'
                                        class="form-control input-sm"
                                        v-validate:address="{
                                            required: {rule: true, message: 'Địa chỉ không được để trống'},
                                        }"
                                    />
                                    <span class="error" v-if="$validation.address.errors">
                                        {{ $validation.address.errors[0].message }}
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="birthday" class="col-sm-3">Ngày sinh</label>
                                <div class="col-sm-9">
                                    <input class="datepicker form-control input-sm"
                                        v-model='userProfile.birthday'
                                        data-date-format="dd/mm/yyyy"
                                        style="width: 200px;"
                                    />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="avatar" class="col-sm-3">Ảnh đại diện</label>
                                <div class="col-sm-9">
                                    <input type="file" class="filestyle" />
                                    <br/>
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
                        <button type="button" class="btn btn-danger" data-dismiss="modal" >Hủy bỏ</button>
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
            userProfile: {},
            errors: {}
        },

        methods: {
            postForm: function () {
                var self = this;
                this.$validate(true, function () {
                    if (self.$validation.invalid) {
                        return;
                    } else {
                        self.userProfile._token = token;
                        self.$parent.updateProfile(self.userProfile);
                    }
                });
            }
        },

        ready: function () {
            this.$parent.formElement = $('#newProfile');
        }
    }
</script>
