<div id="newLocation" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">@{{ modalTitle }}</h4>
            </div>
            <div class="modal-body">
                <validator name="validation" :classes="{ touched: 'touched-validator', dirty: 'dirty-validator' }">
                    <div class="form-group">
                        <div class="required-wrapper">
                            <small>Mã địa điểm</small>
                            <input
                                type='text'
                                class='form-control input-sm'

                                v-model='location.code'
                                v-validate:code="{
                                    required: {rule: true, message: 'Mã địa điểm không được bỏ trống.'},
                                    maxlength: {rule: 11, message: 'Mã địa điểm được quá 11 ký tự.'},
                                    minlength: {rule: 5, message: 'Mã địa điểm không được nhỏ hơn 5 ký tự.'},
                                }"
                            />
                            <span class="error" v-if="$validation.code.errors && isError">
                                @{{ $validation.code.errors[0].message  }}
                            </span>
                        </div>

                        <div class="required-wrapper">
                            <small>Tên địa điểm</small>
                            <input
                                type='text'
                                class='form-control input-sm'

                                v-model='location.name'
                                v-validate:name="{
                                    required: {rule: true, message: 'Tên địa điểm không được bỏ trống.'},
                                    maxlength: {rule: 50, message: 'Tên địa điểm được quá 50 ký tự.'},
                                    minlength: {rule: 10, message: 'Tên địa điểm không được nhỏ hơn 10 ký tự.'},
                                }"
                            />
                            <span class="error" v-if="$validation.name.errors && isError">
                                @{{ $validation.name.errors[0].message  }}
                            </span>
                        </div>

                        <div class="required-wrapper">
                            <small>Chi Nhánh</small>
                            <multiselect
                                :options="branches"
                                :type="json"
                                :selected.sync="branch_ids"
                                :multiple="true"
                                :searchable="true"
                                :local-search="true",
                                :allow-empty="true"
                                v-on:update="branchSelected"
                                :hide-selected="true",
                                :close-on-select="false",
                                deselect-label="Bỏ chọn"
                                select-label="Enter để chọn"
                                label="name"
                                key="id"
                                placeholder="Chi nhánh"
                            ></multiselect>
                        </div>

                        <div class="required-wrapper">
                            <small>Mô tả</small>
                            <textarea
                                v-model="location.description"
                                v-validate:description="{
                                    maxlength: {rule: 200, message: 'Mô tả chỉ được chứa tối đa 200 ký tự.'}
                                }"

                                class="form-control input-sm"
                                rows="3"
                            ></textarea>
                            <span class="error" v-if="$validation.description.errors && isError">
                                @{{ $validation.description.errors[0].message  }}
                            </span>
                        </div>

                        <div v-show="errors.errors" class="alert alert-danger animated jello">
                            <ul>
                                <li v-for="error in errors.messages">@{{ error }}</li>
                            </ul>
                        </div>

                        @include('errors.validate')
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-success" type="submit" v-on:click="validate()">
                            <span class="glyphicon glyphicon-floppy-disk"></span> Lưu lại
                        </button>
                        <button class="btn btn-warning" type="reset">
                            <i class="glyphicon glyphicon-ban-circle"></i> Xóa dữ liệu
                        </button>
                    </div>
                </validator>
            </div>
        </div>
    </div>
</div>
