<template>
    <!-- Update profile -->
    <div id="profile" v-el:profile class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">THÔNG TIN TÀI KHOẢN</h4>
                </div>
                <div class="modal-body">
                <validator name="validation" :classes="{ touched: 'touched-validator', dirty: 'dirty-validator' }">
                    <form class="form-horizontal">
                        <div v-show="isError" class="alert alert-danger animated jello">
                            <ul>
                                <li v-for="error in errors">{{ error }}</li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-3">Tài khoản</label>
                            <div class="col-sm-9">
                                <input type="text" disabled="true" value="{{ item.username }}" class="form-control input-sm" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-3">Email</label>
                            <div class="col-sm-9">
                                <input type="text" disabled="true" value="{{ item.email }}" class="form-control input-sm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-3">Họ tên</label>
                            <div class="col-sm-9">
                                <input type="text" v-validate:fullname="rules" v-model="value.fullname" :value="item.fullname" class="form-control input-sm">
                                <span class="error" v-if="$validation.fullname.errors">{{ $validation.fullname.errors[0].message  }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">Giới tính</label>
                            <div class="col-sm-9">
                                <label class="radio-inline"><input type="radio" value="1" :checked="item.gender == 1" v-model="value.gender">  Nam</label>
                                <label class="radio-inline"><input type="radio" value="2" :checked="item.gender == 2" v-model="value.gender">  Nữ</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-sm-3">Điện thoại</label>
                            <div class="col-sm-9">
                                <input type="text" v-validate:phone="rules" v-model="value.phone" :value="item.phone" class="form-control input-sm"/>
                                <span class="error" v-if="$validation.phone.errors">{{ $validation.phone.errors[0].message  }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-sm-3">Địa chỉ</label>
                            <div class="col-sm-9">
                                <input type="text" v-validate:address="rules" v-model="value.address" :value="item.address" class="form-control input-sm"/>
                                <span class="error" v-if="$validation.address.errors">{{ $validation.address.errors[0].message  }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="avatar" class="col-sm-3">Ảnh đại diện</label>
                            <div class="col-sm-9">
                                <input type="file" v-on:change="onFileChange">
                                <br>
                                <div v-if="item.image_thumbnail && !image">
                                    <img class="img-responsive" :src="renderImage(item.image_thumbnail)">
                                </div>
                                <div v-else>
                                    <img class="img-responsive" :src="image">
                                </div>
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
        props: {
            item: {}
        },
        data: function () {
            return {
                rules: {
                    required: {
                        rule: true,
                        message: 'Không được trống.'
                    },
                    minlength: {
                        rule: 2,
                        message: 'Nhập từ 2 ký tự trở lên.'
                    },
                    maxlength: {
                        rule: 50,
                        message: 'Không được nhiều hơn 40 ký tự.'
                    }
                },
                value: {
                    fullname: '',
                    gender: '',
                    phone: '',
                    address: '',
                },
                errors: {},
                fileImage: {},
                image: '',
                isError: false,
            }
        },
        methods: {
            onFileChange: function (e) {
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
                return window.laroute.route('image',{'path':src});
            },
            postForm: function () {
                var self = this;
                var formData = new FormData();
                formData.append('_token', token);
                this.$validate(true, function () {
                    if (self.$validation.invalid) {
                        return;
                    }

                    if (typeof self.fileImage.name !== 'undefined' ) {
                        formData.append('image', self.fileImage);
                    }

                    formData.append('fullname', self.value.fullname);
                    formData.append('phone', self.value.phone);
                    formData.append('gender', self.value.gender);
                    formData.append('address', self.value.address);
                    
                    self.$parent.UserService.updateProfile(formData).then((response) => {
                        if (response.code === 0) {
                            toastr.success(response.message)
                            $('#profile').modal('hide');
                        } else {
                            toastr.error(response.message)
                        }
                    }, (errors) => {
                        if (errors.errors) {
                            self.isError = true;
                            self.errors = errors.errors;
                        }
                    });
                })
            }
        }
    }
</script>
