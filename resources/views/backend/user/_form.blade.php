<div id="newUser" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" v-if='createAction'>Thêm mới người dùng</h4>
                <h4 class="modal-title" v-else>Sửa thông tin người dùng</h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" novalidate @submit.prevent="validate">
                    <validator name="validation">
                        <div class="form-group">
                            <div class="col-md-4 form-field">
                                <div class="required-wrapper form-field">
                                    <small>Họ và tên</small>
                                    <input type="text" v-model='user.fullname'
                                        class="form-control input-sm"
                                        v-validate:fullname="{
                                            required: {rule: true, message: 'Không được để trống'},
                                            maxlength: {rule: 50, message: 'Không được quá 50 ký tự'},
                                            minlength: {rule: 2, message: 'Không được nhỏ hơn 2 ký tự'},
                                        }"
                                    />
                                    <span class="error" v-if="$validation.fullname.errors && isError">
                                        @{{ $validation.fullname.errors[0].message }}
                                    </span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <small>Tên đăng nhập</small>
                                    <input type="text" v-model='user.username'
                                        class="form-control input-sm"
                                        v-validate:username="{
                                            required: {rule: true, message: 'Không được để trống'},
                                            maxlength: {rule: 50, message: 'Không được quá 50 ký tự'},
                                            minlength: {rule: 3, message: 'Không được nhỏ hơn 3 ký tự'},
                                        }"
                                    />
                                    <span class="error" v-if="$validation.username.errors && isError">
                                        @{{ $validation.username.errors[0].message }}
                                    </span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <small>Mật khẩu</small>
                                    
                                    <input type="password" 
                                        v-model='user.password'
                                        v-if='createAction'
                                        class="form-control input-sm"
                                        v-validate:password="{
                                            required: {rule: true, message: 'Không được để trống'},
                                            maxlength: {rule: 50, message: 'Không được quá 50 ký tự'},
                                            minlength: {rule: 6, message: 'Không được nhỏ hơn 6 ký tự'},
                                        }"
                                    />
                                    
                                    <span class="error" v-if="$validation.password.errors && isError">
                                        @{{ $validation.password.errors[0].message }}
                                    </span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <small>Địa chỉ email</small>
                                    <input type="text" v-model='user.email'
                                        class="form-control input-sm"
                                        v-validate:email="{
                                            required: {rule: true, message: 'Không được để trống'},
                                            maxlength: {rule: 50, message: 'Không được quá 50 ký tự'}
                                        }"
                                    />
                                    <span class="error" v-if="$validation.email.errors && isError">
                                        @{{ $validation.email.errors[0].message }}
                                    </span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <small>Số điện thoại</small>
                                    <input type="text" v-model='user.phone'
                                        class="form-control input-sm"
                                        v-validate:phone="{
                                            maxlength: {rule: 32, message: 'Không được quá 32 ký tự'},
                                            minlength: {rule: 6, message: 'Không được nhỏ hơn 6 ký tự'},
                                        }"
                                    />
                                    <span class="error" v-if="$validation.phone.errors && isError">
                                        @{{ $validation.phone.errors[0].message }}
                                    </span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <div class="radio">
                                        <label  class="radio"><input type="radio" name="gender" value="1" v-model='user.gender' /> Nam</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="gender" value="2" v-model='user.gender' > Nữ</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4 form-field">
                                <div class="required-wrapper form-field">
                                    <small>Địa chỉ</small>
                                    <input type="text" v-model='user.address'
                                        class="form-control input-sm"
                                        v-validate:address="{
                                            required: {rule: true, message: 'Không được để trống'}
                                        }"
                                    />
                                    <span class="error" v-if="$validation.address.errors && isError">
                                        @{{ $validation.address.errors[0].message }}
                                    </span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <small>Ngày sinh</small>
                                    <input v-model='user.birthday' 
                                        class="datepicker form-control input-sm"
                                        data-date-format="dd/mm/yyyy"
                                        v-validate:birthday="{
                                            required: {rule: true, message: 'Không được để trống'}
                                        }"
                                    />
                                    <span class="error" v-if="$validation.birthday.errors && isError">
                                        @{{ $validation.birthday.errors[0].message }}
                                    </span>
                                </div>
                               
                                <div class="required-wrapper form-field">
                                    <small>Thuộc phòng ban</small>
                                    <multiselect
                                        :options="rooms"
                                        :type="json"
                                        :selected.sync="user.rooms_selected"
                                        :multiple="true"
                                        :searchable="true"
                                        :local-search="true"
                                        :allow-empty="true"
                                        @update="roomsSelected"
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
                                        v-model='user.position_id'
                                        v-validate:position_id="{
                                            required: {rule: true, message: 'Vui lòng chọn vị trí hiện tại'}
                                        }">
                                        <option value="">--Chọn--</option>
                                        <option v-for="position in positions"
                                            class="form-control" 
                                            :value="position.id">@{{ position.name }}
                                        </option>
                                    </select>

                                    <span class="error" v-if="$validation.position_id.errors && isError">
                                        @{{ $validation.position_id.errors[0].message }}
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4 form-field">
                                <div class="required-wrapper form-field">
                                    <small>Quyền quản trị</small>
                                    <multiselect
                                        :options="permissions"
                                        :type="json"
                                        :selected.sync="user.permissions_selected"
                                        :multiple="true"
                                        :searchable="true"
                                        :local-search="true"
                                        :allow-empty="true"
                                        @update="permissionsSelected"
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
                                        :selected.sync="user.roles_selected"
                                        :multiple="true"
                                        :searchable="true"
                                        :local-search="true"
                                        :allow-empty="true"
                                        @update="rolesSelected"
                                        :hide-selected="true"
                                        :close-on-select="false"
                                        deselect-label=""
                                        select-label=""
                                        label="name"
                                        key="id"
                                        placeholder="">
                                    </multiselect>
                                </div>
                                
                                <img src="http://gos.dev/assets/img/noproduct.png" width="80%" class="image-product-preview" />
                                <p>Click để thay đổi ảnh đại diện</p>
                            </div>
                        </div>

                        @include('errors/validate')

                        <div class="form-group text-center toolbar">
                            <button class="btn btn-success" type="submit">
                                <span class="glyphicon glyphicon-floppy-disk"></span> Lưu lại
                            </button>

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