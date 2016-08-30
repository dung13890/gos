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
                                    <multiselect
                                        :options="locations"
                                        :type="json"
                                        :selected.sync="branch.locations_selected"
                                        :multiple="true"
                                        :searchable="true"
                                        :local-search="true",
                                        :allow-empty="true"
                                        @update="locationSelected"
                                        :hide-selected="true",
                                        :close-on-select="false",
                                        deselect-label="Bỏ chọn"
                                        select-label="Enter để chọn"
                                        label="name"
                                        key="id"
                                        placeholder="Vùng kinh doanh">
                                    </multiselect>
                                </div>

                                <div class="required-wrapper form-field">
                                    <input type='text' v-model='branch.code'
                                        class='form-control input-sm'
                                        value=''
                                        placeholder='Mã chi nhánh'
                                        v-validate:code="{
                                            required: {rule: true, message: 'Mã chi nhánh không được để trống'},
                                            maxlength: {rule: 11, message: 'Không được quá 11 ký tự'},
                                            minlength: {rule: 5, message: 'Không được nhỏ hơn 5 ký tự'},
                                        }" />
                                    <span class="error" v-if="$validation.code.errors">@{{ $validation.code.errors[0].message  }}</span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <input type='text' v-model='branch.name'
                                        class='form-control input-sm'
                                        placeholder='Tên chi nhánh'
                                        v-validate:name="{
                                            required: {rule: true, message: 'Tên chi nhánh không được bỏ trống'},
                                            maxlength: {rule: 50, message: 'Không được quá 50 ký tự'},
                                            minlength: {rule: 2, message: 'Không được nhỏ hơn 2 ký tự'},
                                        }"
                                    />
                                    <span class="error" v-if="$validation.name.errors">@{{ $validation.name.errors[0].message  }}</span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <input type='text' v-model='branch.address'
                                        class='form-control input-sm'
                                        placeholder='Địa chỉ'
                                        v-validate:address="{
                                            required: {rule: true, message: 'Địa chỉ chi nhánh không được bỏ trống'}
                                        }"
                                    />
                                    <span class="error" v-if="$validation.address.errors">@{{ $validation.address.errors[0].message  }}</span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <input type='text' v-model='branch.phone'
                                        placeholder='Điện thoại'
                                        class='form-control input-sm'
                                    />
                                </div>

                                <div class="required-wrapper form-field">
                                    <input type='text' v-model='branch.fax'
                                        placeholder='Số Fax'
                                        class='form-control input-sm'
                                    />
                                </div>

                                <div class="required-wrapper form-field">
                                    <input type='text' v-model='branch.website'
                                        placeholder='Website'
                                        class='form-control input-sm'
                                    />
                                </div>

                                <div class="required-wrapper form-field">
                                    <div class="checkbox checkbox-success checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox2" v-model='branch.status'>
                                        <label for="inlineCheckbox2">Đang hoạt động</label>
                                    </div>
                                </div>

                                @include('errors.validate')
                                
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
