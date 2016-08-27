<div id="newBranch" class="modal fade">
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
                                    <small>Mã chi nhánh</small>
                                    <input type='text' v-model='branch.code'
                                        class='form-control input-sm'
                                        value=''
                                        v-validate:code="{
                                            required: {rule: true, message: 'Mã chi nhánh không được để trống'},
                                            maxlength: {rule: 11, message: 'Không được quá 11 ký tự'},
                                            minlength: {rule: 5, message: 'Không được nhỏ hơn 5 ký tự'},
                                        }" />
                                    <span class="error" v-if="$validation.code.errors">@{{ $validation.code.errors[0].message  }}</span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <small>Tên chi nhánh</small>
                                    <input type='text' v-model='branch.name'
                                        class='form-control input-sm'
                                        v-validate:name="{
                                            required: {rule: true, message: 'Tên chi nhánh không được bỏ trống'},
                                            maxlength: {rule: 50, message: 'Không được quá 50 ký tự'},
                                            minlength: {rule: 2, message: 'Không được nhỏ hơn 2 ký tự'},
                                        }"
                                    />
                                    <span class="error" v-if="$validation.name.errors">@{{ $validation.name.errors[0].message  }}</span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <small>Địa chỉ</small>
                                    <input type='text' v-model='branch.address'
                                        class='form-control input-sm'
                                        v-validate:address="{
                                            required: {rule: true, message: 'Địa chỉ chi nhánh không được bỏ trống'}
                                        }"
                                    />
                                    <span class="error" v-if="$validation.address.errors">@{{ $validation.address.errors[0].message  }}</span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <small>Điện thoại</small>
                                    <input type='text' v-model='branch.phone'
                                        class='form-control input-sm'
                                    />
                                </div>

                                <div class="required-wrapper form-field">
                                    <small>Số Fax</small>
                                    <input type='text' v-model='branch.fax'
                                        class='form-control input-sm'
                                    />
                                </div>

                                <div class="required-wrapper form-field">
                                    <small>Website</small>
                                    <input type='text' v-model='branch.website'
                                        class='form-control input-sm'
                                    />
                                </div>

                                <div class="required-wrapper form-field">
                                    Đang hoạt động <input type='checkbox' v-model='branch.status' class='input-sm'/>
                                </div>

                                <div class="required-wrapper form-field">
                                    <small>Vùng áp dụng kinh doanh</small>
                                    <select class='form-control input-sm'>
                                        <option value='' >Vùng áp dụng</option>
                                        <option v-for="location in locations" :value="location.id">@{{location.name}}</option>
                                    </select>
                                </div>

                                <template>
                                  <div>
                                    <multiselect
                                      :selected="selected"
                                      :options="options"
                                      @update="updateSelected">
                                    </multiselect>
                                  </div>
                                </template>
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
