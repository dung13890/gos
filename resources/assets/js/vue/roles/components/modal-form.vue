<template>
    <div id="newRole" class="modal fade">
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
                                    <span class="error" v-if="$validation.name.errors">
                                        {{ $validation.name.errors[0].message }}
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
                                            <input value="{{ permission.id }}"
                                                v-model="permissions_checked"
                                                type="checkbox"
                                                id="inlineCheckbox-{{ permission.id }}"
                                            />
                                            <label for="inlineCheckbox-{{ permission.id }}">{{ permission.name }}</label>
                                        </div>
                                    </div>
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

                            <button class="btn btn-warning" type="reset"><i class="glyphicon glyphicon-ban-circle"></i> Hủy</button>

                            <button type="button" class="btn btn-danger" data-dismiss="modal" >Hủy bỏ</button>
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
    export default {
        props: {
            permissions: [],
            role: {},
            errors: {},
            modalTitle: '',
        },

        watch: {
            'role' : function (val, oldVal) {
                if (typeof val.permissions != 'undefined') {
                    this.permissions_checked = val.permissions.map(function (permission) {
                        return permission.id.toString();
                    });
                }
            }
        },

        data: function () {
            return {
                permissions_checked: [],
            }
        },

        methods: {
            postForm: function () {
                var self = this;
                this.$validate(true, function () {
                    if (self.$validation.invalid) {
                        return;
                    } else {
                        self.role._token = token;
                        self.role.permissions_checked = self.permissions_checked;

                        if (self.role.id) {
                            self.$parent.update(self.role, self.role.id);
                        } else {
                            self.$parent.store(self.role);
                        }
                    }
                });
            }
        },

        ready: function () {
            this.$parent.formRole = $('#newRole');
        }
    }
</script>