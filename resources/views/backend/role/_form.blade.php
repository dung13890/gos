<div id="newRole" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Thêm mới nhóm quyền</h4>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" novalidate @submit.prevent="validate">    
                <validator name="validation">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="required-wrapper">
                                <small>Tên nhóm quyền</small>
                                
                                <input type="text"
                                    class="form-control input-sm"
                                    v-model="role.name"
                                    v-validate:name="{
                                        required: {rule: true, message: 'Tên quyền không được để trống'},
                                        maxlength: {rule: 200, message: 'Không được quá 200 ký tự'}
                                    }"
                                />
                                <span class="error" v-if="$validation.name.errors && isError">
                                    @{{ $validation.name.errors[0].message }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <small>Mô tả</small>
                            <textarea
                                v-model="role.description"
                                class="form-control input-sm"
                                rows="5"></textarea>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="lineside text-center title-permission">
                                <span class="text">Những quyền hạn được phép</span>
                            </label>

                            <div class="col-xs-6 list-permission pull-left" v-for="permission in permissions">
                                <div class="permission-onoff">
                                    <div class="checkbox checkbox-success checkbox-inline">
                                        <input v-model="permissions_checked"
                                            type="checkbox"
                                            id="inlineCheckbox@{{ permission.id }}"
                                            :value="permission.id"
                                        />
                                        <label for="inlineCheckbox@{{ permission.id }}">@{{ permission.name }}</label>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    @include('errors/validate')
                    
                    <div class="form-group text-center toolbar">
                        <button class="btn btn-success" type="submit">
                            <span class="glyphicon glyphicon-floppy-disk"></span> Lưu lại
                        </button>

                        <button class="btn btn-warning" type="button" data-dismiss="modal" aria-hidden="true">
                            <i class="glyphicon glyphicon-ban-circle"></i> Xóa
                        </button>

                        <button type="button" class="btn btn-danger" data-dismiss="modal" >Hủy bỏ</button>
                    </div>
                    </validator>
                </form>
            </div>
        </div>
    </div>
</div>