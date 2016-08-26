<template>
    <div id="new-role" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Thêm mới nhóm quyền</h4>
                </div>
                <div class="modal-body">
                <validator name="validation">
                    <form class="form-horizontal">
                        <div v-if="isError" class="alert alert-danger animated jello">
                            <ul>
                                <li v-for="error in errors">{{ error }}</li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="required-wrapper">
                                    <input type="text" v-validate:name="rules" class="form-required input-sm" v-model="role.name" placeholder="Tên nhóm quyền" />
                                    <span class="fa fa-exclamation"></span>
                                    <span class="error" v-if="$validation.name.errors">{{ $validation.name.errors[0].message  }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <textarea v-model="role.description" class="form-control input-sm" rows="5" placeholder="Mô tả"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label class="lineside text-center title-permission">
                                    <span class="text">Những quyền hạn được phép</span>
                                </label>

                                <div class="col-xs-6 list-permission" v-for="chunks in permissions">
                                    <div class="permission-onoff" v-for="permission in chunks">
                                        {{ permission.name }} <input type="checkbox" :value="permission.id" class="on-off" name="my-checkbox" data-size="mini" v-model="role.perms" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <a v-on:click="postForm(role.id)" class="btn btn-success">
                                <span class="glyphicon glyphicon-floppy-disk"></span> Lưu
                            </a>

                            <button class="btn btn-info" type="submit">
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
</template>

<script>
    var token = $('meta[name="csrf-token"]').attr('content')
    export default {
        props: {
            item: {}
        },
        data: function () {
            return {
                rules: {
                    required: {
                        rule: true,
                        message: 'Không được trống.'
                    },
                    minlength: {
                        rule: 2,
                        message: 'Nhập từ 2 ký tự trở lên.'
                    },
                    maxlength: {
                        rule: 50,
                        message: 'Không được nhiều hơn 50 ký tự.'
                    }
                },
                permissions: {},
                role: {
                    id: '',
                    perms: []
                },
                errors: {},
                isError: false,
            }
        },
        methods: {
            getPermission: function () {
                var self = this;
                this.$parent.RoleService.getPermission().then((permissions) => self.permissions = permissions).then(() => {
                    bootstrapSwitch($('.on-off'));
                });
            },
            getRole: function (id) {
                var self = this;
                var array = [];
                this.$parent.RoleService.getRole(id).then((role) => self.role = role).then((role) => {
                    role.perms.map(function (val) {
                        array.push(val.id);
                    });
                    self.role.perms = array;
                });
            },
            update: function (formData, id) {
                var self = this;
                self.$parent.RoleService.update(formData, id).then((response) => {
                    if (response.code === 0) {
                        toastr.success(response.message)
                        $('#new-role').modal('hide');
                        location.reload();
                    } else {
                        toastr.error(response.message)
                    }
                }, (errors) => {
                    if (errors.errors) {
                        self.isError = true;
                        self.errors = errors.errors;
                    }
                })
            },
            store: function (formData) {
                var self = this;
                self.$parent.RoleService.store(formData).then((response) => { 
                    if (response.code === 0) {
                        toastr.success(response.message)
                        $('#new-role').modal('hide');
                        window.location.reload();
                    } else {
                        toastr.error(response.message)
                    }
                }, (errors) => {
                    if (errors.errors) {
                        self.isError = true;
                        self.errors = errors.errors;
                    }
                });
            },
            postForm: function (id) {
                var self = this;
                var formData = new FormData();
                formData.append('_token', token);
                this.$validate(true, function () { 
                    if (self.$validation.invalid) {
                        return;
                    }
                    formData.append('name', self.role.name);
                    formData.append('description', self.role.description);
                    formData.append('perms', self.role.perms);
                    if (id) {
                        self.update(formData, id);
                    } else {
                        self.store(formData);
                    }
                });
            },
        },
        ready: function () {
            var self = this;
            $('#new-role').on('show.bs.modal', function (event) { 
                var id = $(event.relatedTarget).data('id');
                if (typeof id != 'undefined') {
                    self.getRole(id);
                } else {
                    self.$set('role', {});
                    self.$set('role.perms', []);
                }
            });
            this.getPermission();
        },
    }
</script>