<template>
    <div id="newUser" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{ modalTitle }}</h4>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal">
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
                                        <span class="error" v-if="$validation.fullname.errors">
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
                                        <span class="error" v-if="$validation.username.errors">
                                            {{ $validation.username.errors[0].message }}
                                        </span>
                                    </div>

                                    <div class="required-wrapper form-field">
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
                                        
                                        <span class="error" v-if="$validation.password.errors">
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
                                        <span class="error" v-if="$validation.email.errors">
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
                                        <span class="error" v-if="$validation.phone.errors">
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
                                        <span class="error" v-if="$validation.address.errors">
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
                                        <span class="error" v-if="$validation.birthday.errors">
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

                                        <span class="error" v-if="$validation.position_id.errors">
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
                                        <div v-if="item.image_thumbnail && !image">
                                            <img class="img-responsive" :src="renderImage(item.image_thumbnail)">
                                        </div>
                                        <div v-else>
                                            <img class="img-responsive" :src="image">
                                        </div>
                                        <br>
                                        <input type="file" class="filestyle" v-on:change="onFileChange">
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

                                <button class="btn btn-warning" type="reset">
                                    <span class="glyphicon glyphicon-ban-circle"></span> Hủy
                                </button>
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
                permission_ids: [],
                role_ids: [],
                room_ids: [],
                fileImage: {},
                image: '/assets/img/noproduct.png',
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
                        return;
                    } else {
                        self.item._token = token;
                        self.item.permission_ids = self.permission_ids;
                        self.item.role_ids = self.role_ids;
                        self.item.room_ids = self.room_ids;
                        if (typeof self.fileImage != 'undefined') {
                            var formData = new FormData();
                            formData.append('image', self.fileImage);
                            console.log(formData);
                            self.item.image = formData.get('image');
                        }

                        if (self.item.id) {
                            self.$parent.update(self.item, self.item.id);
                        } else {
                            self.$parent.store(self.item);
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