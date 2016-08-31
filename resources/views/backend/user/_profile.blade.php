<div id="profile" v-el:profile class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Thông tin tài khoản</h4>
            </div>

            <form class="form-horizontal" novalidate @submit.prevent="validate">
                <div class="modal-body">
                    <validator name="validation">
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
                                <input type="text" v-model='userProfile.email'
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
                                    @{{ $validation.fullname.errors[0].message }}
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
                                        name="gender" /> Nữ
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone" class="col-sm-3">Điện thoại</label>
                            <div class="col-sm-9">
                                <input type="text" v-model='userProfile.phone'
                                    class="form-control input-sm"
                                    v-validate:phone="{
                                        required: {rule: true, message: 'Số điện thoại không được để trống'},
                                    }"
                                />

                                <span class="error" v-if="$validation.phone.errors && isError">
                                    @{{ $validation.phone.errors[0].message }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="address" class="col-sm-3">Địa chỉ</label>
                            <div class="col-sm-9">
                                <input type="text" v-model='userProfile.address'
                                    class="form-control input-sm"
                                    v-validate:address="{
                                        required: {rule: true, message: 'Địa chỉ không được để trống'},
                                    }"
                                />
                                <span class="error" v-if="$validation.address.errors && isError">
                                    @{{ $validation.address.errors[0].message }}
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="avatar" class="col-sm-3">Ảnh đại diện</label>
                            <div class="col-sm-9">
                                <input type="file" class="filestyle" data-badge="false" data-size="sm" />
                                
                            </div>
                        </div>
                    </validator>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Xác nhận</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" >Hủy bỏ</button>
                </div>
            </form>
        </div>
    </div>
</div>
