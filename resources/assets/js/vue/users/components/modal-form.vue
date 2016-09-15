<template>
    <div id="newUser" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{ modalTitle }}</h4>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" novalidate>
                        <validator name="validation">
                            <div class="form-group">
                                <div class="col-md-4 form-field">
                                    <div class="required-wrapper form-field">
                                        <small>Họ và tên</small>
                                        <input type="text" v-model='item.fullname'
                                            class="form-control input-sm"
                                            v-validate:fullname="{
                                                required: {rule: true, message: 'Không được để trống'},
                                                maxlength: {rule: 50, message: 'Không được quá 50 ký tự'},
                                                minlength: {rule: 2, message: 'Không được nhỏ hơn 2 ký tự'},
                                            }"
                                        />
                                        <span class="error" v-if="$validation.fullname.errors && isError">
                                            {{ $validation.fullname.errors[0].message }}
                                        </span>
                                    </div>

                                    <div class="required-wrapper form-field">
                                        <small>Tên đăng nhập</small>
                                        <input type="text" v-model='item.username'
                                            class="form-control input-sm"
                                            v-validate:username="{
                                                required: {rule: true, message: 'Không được để trống'},
                                                maxlength: {rule: 50, message: 'Không được quá 50 ký tự'},
                                                minlength: {rule: 3, message: 'Không được nhỏ hơn 3 ký tự'},
                                            }"
                                        />
                                        <span class="error" v-if="$validation.username.errors && isError">
                                            {{ $validation.username.errors[0].message }}
                                        </span>
                                    </div>

                                    <div v-if="item.id" class="required-wrapper form-field">
                                        <small>Mật khẩu</small>
                                        
                                        <input type="password" 
                                            v-model='item.password'
                                            class="form-control input-sm"
                                        />
                                    </div>

                                    <div v-else class="required-wrapper form-field">
                                        <small>Mật khẩu</small>
                                        
                                        <input type="password" 
                                            v-model='item.password'
                                            class="form-control input-sm"
                                            v-validate:password="{
                                                required: {rule: true, message: 'Không được để trống'},
                                                maxlength: {rule: 50, message: 'Không được quá 50 ký tự'},
                                                minlength: {rule: 6, message: 'Không được nhỏ hơn 6 ký tự'},
                                            }"
                                        />
                                        
                                        <span class="error" v-if="$validation.password.errors && isError">
                                            {{ $validation.password.errors[0].message }}
                                        </span>
                                    </div>

                                    <div class="required-wrapper form-field">
                                        <small>Địa chỉ email</small>
                                        <input type="text" v-model='item.email'
                                            class="form-control input-sm"
                                            v-validate:email="{
                                                required: {rule: true, message: 'Không được để trống'},
                                                maxlength: {rule: 50, message: 'Không được quá 50 ký tự'}
                                            }"
                                        />
                                        <span class="error" v-if="$validation.email.errors && isError">
                                            {{ $validation.email.errors[0].message }}
                                        </span>
                                    </div>

                                    <div class="required-wrapper form-field">
                                        <small>Số điện thoại</small>
                                        <input type="text" v-model='item.phone'
                                            class="form-control input-sm"
                                            v-validate:phone="{
                                                maxlength: {rule: 32, message: 'Không được quá 32 ký tự'},
                                                minlength: {rule: 6, message: 'Không được nhỏ hơn 6 ký tự'},
                                            }"
                                        />
                                        <span class="error" v-if="$validation.phone.errors && isError">
                                            {{ $validation.phone.errors[0].message }}
                                        </span>
                                    </div>

                                    <div class="required-wrapper form-field">
                                        <div class="radio">
                                            <input id="gender-1" type="radio" value="1" v-model='item.gender' />
                                            <label for="gender-1"> Nam</label>
                                        </div>
                                        <div class="radio">
                                            <input id="gender-2" type="radio" value="2" v-model='item.gender' >
                                            <label for="gender-2"> Nữ</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4 form-field">
                                    <div class="required-wrapper form-field">
                                        <small>Địa chỉ</small>
                                        <input type="text" v-model='item.address'
                                            class="form-control input-sm"
                                            v-validate:address="{
                                                required: {rule: true, message: 'Không được để trống'}
                                            }"
                                        />
                                        <span class="error" v-if="$validation.address.errors && isError">
                                            {{ $validation.address.errors[0].message }}
                                        </span>
                                    </div>

                                    <div class="required-wrapper form-field">
                                        <small>Ngày sinh</small>
                                        <input v-model='item.birthday' 
                                            class="datepicker form-control input-sm"
                                            data-date-format="dd/mm/yyyy"
                                            v-validate:birthday="{
                                                required: {rule: true, message: 'Không được để trống'}
                                            }"
                                        />
                                        <span class="error" v-if="$validation.birthday.errors && isError">
                                            {{ $validation.birthday.errors[0].message }}
                                        </span>
                                    </div>
                                   
                                    <div class="required-wrapper form-field">
                                        <small>Thuộc phòng ban</small>
                                        <multiselect
                                            :options="rooms"
                                            :type="json"
                                            :selected.sync="room_ids"
                                            :multiple="true"
                                            :searchable="true"
                                            :local-search="true"
                                            :allow-empty="true"
                                            v-on:update="roomsSelected"
                                            :hide-selected="true"
                                            :close-on-select="false"
                                            deselect-label=""
                                            select-label=""
                                            label="name"
                                            key="id"
                                            placeholder="">
                                        </multiselect>
                                    </div>

                                    <div class="required-wrapper form-field">
                                        <small>Vị trí hiện tại</small>
                                        <select
                                            required class="form-control input-sm"
                                            v-model='item.position_id'
                                            v-validate:position_id="{
                                                required: {rule: true, message: 'Vui lòng chọn vị trí hiện tại'}
                                            }">
                                            <option value="">--Chọn--</option>
                                            <option v-for="position in positions"
                                                class="form-control" 
                                                :value="position.id">{{ position.name }}
                                            </option>
                                        </select>

                                        <span class="error" v-if="$validation.position_id.errors && isError">
                                            {{ $validation.position_id.errors[0].message }}
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-4 form-field">
                                    <div class="required-wrapper form-field">
                                        <small>Quyền quản trị</small>
                                        <multiselect
                                            :options="permissions"
                                            :type="json"
                                            :selected.sync="permission_ids"
                                            :multiple="true"
                                            :searchable="true"
                                            :local-search="true"
                                            :allow-empty="true"
                                            v-on:update="permissionsSelected"
                                            :hide-selected="true"
                                            :close-on-select="false"
                                            deselect-label=""
                                            select-label=""
                                            label="name"
                                            key="id"
                                            placeholder="">
                                        </multiselect>
                                    </div>
                                    
                                    <div class="required-wrapper form-field">
                                        <small>Nhóm quyền quản trị</small>
                                        <multiselect
                                            :options="roles"
                                            :type="json"
                                            :selected.sync="role_ids"
                                            :multiple="true"
                                            :searchable="true"
                                            :local-search="true"
                                            :allow-empty="true"
                                            v-on:update="rolesSelected"
                                            :hide-selected="true"
                                            :close-on-select="false"
                                            deselect-label=""
                                            select-label=""
                                            label="name"
                                            key="id"
                                            placeholder="">
                                        </multiselect>
                                    </div>

                                    <div class="required-wrapper form-field">
                                        <div v-if="item.image_thumbnail && !isFileChange">
                                            <img class="img-responsive" :src="renderImage(item.image_thumbnail)">
                                        </div>
                                        <div v-else>
                                            <img class="img-responsive" :src="image">
                                        </div>
                                        <br>
                                        <input type="file" class="filestyle" accept="image/*" v-on:change="onFileChange">
                                        <small>Ảnh đại diện</small>
                                    </div>
                                </div>
                            </div>

                            <div v-show="errors.errors" class="alert alert-danger animated jello">
                                <ul>
                                    <li v-for="error in errors.messages">{{ error }}</li>
                                </ul>
                            </div>

                            <div class="form-group text-center toolbar">
                                <a class="btn btn-success" v-on:click.prevent="postForm">
                                    <span class="glyphicon glyphicon-floppy-disk"></span> Lưu lại
                                </a>

                                <button type="button" class="btn btn-danger" data-dismiss="modal" >Hủy bỏ</button>
                            </div>
                        </validator> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    var token = $('meta[name="csrf-token"]').attr('content');
    import Multiselect from 'vue-multiselect';
    export default {
        props: {
            item: {},
            positions: [],
            rooms: [],
            permissions: [],
            roles: [],
            errors: {},
            modalTitle: '',
        },

        data: function () {
            return {
                fileInput2: '',
                isError: false,
                permission_ids: [],
                role_ids: [],
                room_ids: [],
                isFileChange: false,
                fileImage: {},
                image: '/assets/img/noproduct.png',
            }
        },

        watch: {
            'item' : function (val, oldVal) {
                if (val.id != oldVal.id) {
                    this.permission_ids = val.permissions || [];
                    this.room_ids = val.rooms || [];
                    this.role_ids = val.roles || [];
                    this.image = '/assets/img/noproduct.png';
                    this.isFileChange = false;
                    this.isError = false;
                    this.fileImage = {};
                }
            }
        },

        methods: {
            permissionsSelected: function (selected) {
                this.permission_ids = selected;
            },

            rolesSelected: function (selected) {
                this.role_ids = selected;
            },

            roomsSelected: function (selected) {
                this.room_ids = selected;
            },

            onFileChange: function (e) {
                this.isFileChange = true;
                var files = e.target.files || e.dataTransfer.files;

                if (!files.length) {
                    return;
                }

                this.fileImage = files[0];
                console.log(this.fileImage);
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

            postForm: function () {
                var self = this;
                this.$validate(true, function () {
                    if (self.$validation.invalid) {
                        self.isError = true;
                    } else {
                        var formData = new FormData();
                        self.item._token = token;
                        self.item.permission_ids = $.map(self.permission_ids, function (val) {
                            return val.id;
                        });
                        self.item.role_ids = $.map(self.role_ids, function (val) {
                            return val.id;
                        });
                        self.item.room_ids = $.map(self.room_ids, function (val) {
                            return val.id;
                        });

                        if (typeof self.fileImage.name != 'undefined') {
                            formData.append('image', self.fileImage);
                        }

                        if (typeof self.item.password != 'undefined') {
                            formData.append('password', self.item.password);
                        }
                        
                        // create form data
                        formData.append('_token', self.item._token);
                        if (typeof self.item.username != 'undefined') {
                            formData.append('username', self.item.username);
                        }

                        if (typeof self.item.fullname != 'undefined') {
                            formData.append('fullname', self.item.fullname);
                        }

                        if (typeof self.item.email != 'undefined') {
                            formData.append('email', self.item.email);
                        }

                        if (typeof self.item.phone != 'undefined') {
                            formData.append('phone', self.item.phone);
                        }

                        if (self.item.gender) {
                            formData.append('gender', self.item.gender);
                        }

                        if (typeof self.item.address != 'undefined') {
                            formData.append('address', self.item.address);
                        }

                        if (typeof self.item.position_id != 'undefined') {
                            formData.append('position_id', self.item.position_id);
                        }

                        if (typeof self.item.birthday != 'undefined') {
                            formData.append('birthday', self.item.birthday);
                        }

                        if (self.item.role_ids.length) {
                            formData.append('role_ids', JSON.stringify(self.item.role_ids));
                        }

                        if (self.item.room_ids.length) {
                            formData.append('room_ids', JSON.stringify(self.item.room_ids));
                        }

                        if (self.item.permission_ids.length) {
                            formData.append('permission_ids', JSON.stringify(self.item.permission_ids));
                        }

                        if (self.item.id) {
                            self.$parent.update(formData, self.item.id);
                        } else {
                            self.$parent.store(formData);
                        }
                    }
                });
            }
        },

        ready: function () {
            this.$parent.formElement = $('#newUser');
        },

        components: { Multiselect }

    }
</script>