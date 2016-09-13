<template>
    <div id="newProfile" class="modal fade">
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
                                    <span class="error" v-if="$validation.fullname.errors && isError">
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
                                    <span class="error" v-if="$validation.phone.errors && isError">
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
                                    <span class="error" v-if="$validation.address.errors && isError">
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
                                <label for="avatar" class="col-sm-3">Ảnh đại diện {{ isFileChange }}</label>
                                <div class="col-sm-9">
                                    <div v-if="userProfile.image_thumbnail && !isFileChange">
                                        <img class="img-responsive" :src="renderImage(userProfile.image_thumbnail)">
                                    </div>
                                    <div v-else>
                                        <img class="img-responsive" :src="image">
                                    </div>
                                    <br>
                                    <input type="file" class="filestyle" accept="image/*" v-on:change="onFileChange" />
                                    <br/>
                                </div>
                            </div>
                        </validator>
                        <div v-show="errors.errors" class="alert alert-danger animated jello">
                            <ul>
                                <li v-for="error in errors.messages">{{ error }}</li>
                            </ul>
                        </div>
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

        data: function () {
            return {
                isError: false,
                isFileChange: false,
                fileImage: {},
                image: '/assets/img/noproduct.png',
            }
        },

        methods: {
            postForm: function () {
                var self = this;
                var formData = new FormData();
                this.$validate(true, function () {
                    if (self.$validation.invalid) {
                        self.isError = true;
                    } else {
                        formData.append('_token', token);
                        formData.append('fullname', self.userProfile.fullname);
                        formData.append('gender', self.userProfile.gender);
                        formData.append('phone', self.userProfile.phone);
                        formData.append('address', self.userProfile.address);
                        formData.append('birthday', self.userProfile.birthday);

                        if (typeof self.fileImage.name != 'undefined') {
                            formData.append('image', self.fileImage);
                        }

                        self.$parent.updateProfile(formData);
                    }
                });
            },

            onFileChange: function (e) {
                this.isFileChange = true;
                var files = e.target.files || e.dataTransfer.files;

                if (!files.length) {
                    return;
                }

                this.fileImage = files[0];
                this.createImage(files[0]);
            },

            createImage: function (file) {
                var self = this;
                var image = new Image();
                var reader = new FileReader();
                reader.onload = (e) => {
                    self.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },

            renderImage: function(src) {
                return window.laroute.route('image', {'path':src});
            },
        },

        ready: function () {
            this.$parent.formElement = $('#newProfile');
        }
    }
</script>
