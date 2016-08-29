<div id="newRoom" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">@{{ modalTitle }}</h4>
            </div>

            <div class="modal-body">
                <validator name="validation" :classes="{ touched: 'touched-validator', dirty: 'dirty-validator' }">
                    <form action="" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="required-wrapper form-field">
                                    <small>Chi nhánh</small>
                                    <select 
                                        required class="form-control input-sm"
                                        v-model='room.branch_id'
                                        v-validate:branch_id="{
                                            required: {rule: true, message: 'Vui lòng chọn chi nhánh'}
                                        }">
                                        <option v-for="branch in branches" :value="branch.id">@{{ branch.name }}</option>
                                    </select>
                                </div>

                                <div class="required-wrapper form-field">
                                    <small>Mã phòng ban</small>
                                    <input type='text' 
                                        v-model='room.code'
                                        class='form-control input-sm'
                                        value=''
                                        v-validate:code="{
                                            required: {rule: true, message: 'Mã phòng ban không được để trống'},
                                            maxlength: {rule: 11, message: 'Không được quá 11 ký tự'},
                                            minlength: {rule: 5, message: 'Không được nhỏ hơn 5 ký tự'},
                                        }" />
                                    <span class="error" v-if="$validation.code.errors">@{{ $validation.code.errors[0].message  }}</span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <small>Tên phòng ban</small>
                                    <input type='text' v-model='room.name'
                                        class='form-control input-sm'
                                        v-validate:name="{
                                            required: {rule: true, message: 'Tên phòng ban không được bỏ trống'},
                                            maxlength: {rule: 50, message: 'Không được quá 50 ký tự'},
                                            minlength: {rule: 2, message: 'Không được nhỏ hơn 2 ký tự'},
                                        }"
                                    />
                                    <span class="error" v-if="$validation.name.errors">@{{ $validation.name.errors[0].message  }}</span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <small>Tên trưởng phòng</small>
                                    <input type='text' v-model='room.manager'
                                        class='form-control input-sm'
                                        v-validate:manager="{
                                            required: {rule: true, message: 'Tên trưởng phòng không được bỏ trống'}
                                        }"
                                    />
                                    <span class="error" v-if="$validation.manager.errors">@{{ $validation.manager.errors[0].message  }}</span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <small>Số lượng nhân viên</small>
                                    <input type='text' v-model='room.member'
                                        class='form-control input-sm'
                                    />
                                </div>

                                <div class="required-wrapper form-field">
                                    <small>Ngày thành lập</small>
                                    <input type='date' v-model='room.founding'
                                        class='form-control input-sm'
                                    />
                                </div>

                                <div class="required-wrapper">
                                    <small>Thông tin khác</small>
                                    <textarea class="form-control input-sm" rows="3" v-model='room.description' cols="50"></textarea>
                                </div>

                            </div>
                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-success" type="button" v-on:click="validate()">
                                <span class="glyphicon glyphicon-floppy-disk"></span> Lưu lại
                            </button>

                            <button class="btn btn-warning" type="reset"><i class="glyphicon glyphicon-ban-circle"></i> Xóa dữ liệu</button>
                        </div>
                    </form>
                </validator>
            </div>
        </div>
    </div>
</div>
