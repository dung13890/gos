<div id="newProvider" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Thêm mới phòng ban @{{ test }}</h4>
                </div>
                <div class="modal-body">
                    <validator name="validation" :classes="{ touched: 'touched-validator', dirty: 'dirty-validator' }">
                        <form action="" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <div class="required-wrapper form-field">
                                        <input type='text' v-model='room.name' 
                                            class='form-required input-sm'
                                            placeholder='Tên phòng ban'
                                            value=''
                                            v-validate:name="{
                                                required: {rule: true, message: 'Tên phòng ban không được bỏ trống'},
                                                maxlength: { rule: 50, message: 'Không được quá 50 ký tự'}
                                            }"
                                        />
                                        <span class="fa fa-exclamation"></span>
                                        <span class="error" v-if="$validation.name.errors">@{{ $validation.name.errors[0].message  }}</span>
                                    </div>

                                    <div class="required-wrapper form-field">
                                        <input type='text' v-model='room.manager'
                                            class='form-required input-sm'
                                            placeholder='Tên trưởng phòng' value=''
                                            v-validate:manager="{
                                                required: {rule: true, message: 'Tên trưởng phòng không được bỏ trống'},
                                                maxlength: { rule: 50, message: 'Không được quá 50 ký tự'}
                                            }"
                                        />
                                        <span class="fa fa-exclamation"></span>
                                        <span class="error" v-if="$validation.manager.errors">@{{ $validation.manager.errors[0].message  }}</span>
                                    </div>

                                    <div class="required-wrapper form-field">
                                        <input type="text" v-model='room.member'
                                            class='form-control input-sm'
                                            placeholder="Số nhân viên"
                                            value='' 
                                            v-validate:member="{
                                                required: {rule: true, message: 'Số nhân viên không được trống'},
                                                maxlength: { rule: 5, message: 'Không được quá 5 ký tự'}
                                            }"
                                        />

                                        <span class="error" v-if="$validation.member.errors">@{{ $validation.member.errors[0].message }}</span>
                                    </div>

                                    <div class="required-wrapper form-field">
                                        <input v-model='room.founding' type="date" class="form-control input-sm" placeholder="Ngày thành lập" value="" />
                                    </div>

                                    <div class="required-wrapper form-field">
                                        <select v-model='room.branch_id'
                                            class="form-control input-sm"
                                            v-validate:branch_id="{
                                                required: {rule: true, message: 'Vui lòng chọn chi nhánh'}
                                            }">
                                            <option value="">Thuộc chi nhánh</option>
                                            <option value="1">Hà Nội</option>
                                            <option value=2"">Hải Phòng</option>
                                            <option value=1"">HCM</option>
                                        </select>
                                        <span class="error" v-if="$validation.branch_id.errors">@{{ $validation.branch_id.errors[0].message }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <textarea v-model='room.description' 
                                        class='form-control input-sm'
                                        placeholder="Thông tin giới thiệu"
                                        rows='10'>    
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-success" type="button" v-on:click="submitForm">
                                    <span class="glyphicon glyphicon-floppy-disk"></span> Lưu
                                </button>

                                <button class="btn btn-info" type="button">
                                    <span class="glyphicon glyphicon-floppy-disk"></span> Lưu và thêm mới
                                </button>

                                <button class="btn btn-warning" type="reset"><i class="glyphicon glyphicon-ban-circle"></i> Clear</button>
                            </div>
                        </form>
                    </validator>
                </div>
            </div>
        </div>
    </div>