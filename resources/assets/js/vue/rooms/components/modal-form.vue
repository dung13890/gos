<template>
    <div id="newRoom" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{ modalTitle }}</h4>
                </div>

                <div class="modal-body">
                    <validator name="validation">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="required-wrapper form-field">
                                        <small>Chi nhánh</small>
                                        <select 
                                            required class="form-control input-sm"
                                            v-model='item.branch_id'
                                            v-validate:branch_id="{
                                                required: {rule: true, message: 'Vui lòng chọn chi nhánh'}
                                            }">
                                            <option value="">--Chọn--</option>
                                            <option v-for="branch in branches" :value="branch.id">{{ branch.name }}</option>
                                        </select>

                                        <span class="error" v-if="$validation.branch_id.errors && isError">
                                            {{ $validation.branch_id.errors[0].message }}
                                        </span>
                                    </div>

                                    <div class="required-wrapper form-field">
                                        <small>Quyền quản trị</small>
                                        <multiselect
                                            :options="permissions"
                                            :type="json"
                                            :selected.sync="permission_ids"
                                            :multiple="true"
                                            :searchable="true"
                                            :local-search="true"
                                            :allow-empty="true"
                                            v-on:update="permissionsSelected"
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
                                        <small>Mã phòng ban</small>
                                        <input type='text' 
                                            v-model='item.code'
                                            class='form-control input-sm'
                                            v-validate:code="{
                                                required: {rule: true, message: 'Mã phòng ban không được để trống'},
                                                maxlength: {rule: 11, message: 'Không được quá 11 ký tự'},
                                                minlength: {rule: 5, message: 'Không được nhỏ hơn 5 ký tự'},
                                            }" />
                                        <span class="error" v-if="$validation.code.errors && isError">{{ $validation.code.errors[0].message  }}</span>
                                    </div>

                                    <div class="required-wrapper form-field">
                                        <small>Tên phòng ban</small>
                                        <input type='text' v-model='item.name'
                                            class='form-control input-sm'
                                            v-validate:name="{
                                                required: {rule: true, message: 'Tên phòng ban không được bỏ trống'},
                                                maxlength: {rule: 50, message: 'Không được quá 50 ký tự'},
                                                minlength: {rule: 2, message: 'Không được nhỏ hơn 2 ký tự'},
                                            }"
                                        />
                                        <span class="error" v-if="$validation.name.errors && isError">{{ $validation.name.errors[0].message  }}</span>
                                    </div>

                                    <div class="required-wrapper form-field">
                                        <small>Ngày thành lập</small>
                                        <input v-model='item.founding'
                                            class='datepicker form-control input-sm'
                                        />
                                    </div>

                                    <div class="required-wrapper">
                                        <small>Thông tin khác</small>
                                        <textarea class="form-control input-sm" rows="3" v-model='item.description' cols="50"></textarea>
                                    </div>

                                    <div v-show="errors.errors" class="alert alert-danger animated jello">
                                        <ul>
                                            <li v-for="error in errors.messages">{{ error }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-success" type="button" v-on:click.prevent="postForm">
                                    <span class="glyphicon glyphicon-floppy-disk"></span> Lưu lại
                                </button>

                                <button type="button" class="btn btn-danger" data-dismiss="modal" >Hủy bỏ</button>
                            </div>
                        </form>
                    </validator>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
    var token = $('meta[name="csrf-token"]').attr('content');
    import Multiselect from 'vue-multiselect';
    export default {
        props: {
            item: {},
            errors: {},
            branches: [],
            permissions: [],
            modalTitle: '',
            permission_ids: []
        },

        data: function () {
            return {
                isError: false,
            }
        },

        watch: {
            'item' : function (val, oldVal) {
                if (val.id != oldVal.id) {
                    this.permission_ids = val.permissions || [];
                    this.isError = false;
                }
            }
        },

        methods: {
            permissionsSelected: function (selected) {
                this.permission_ids = selected;
            },

            postForm: function () {
                this.errors = {};
                var self = this;
                this.$validate(true, function () {
                    if (self.$validation.invalid) {
                        self.isError = true;
                    } else {
                        self.isError = false;
                        self.item._token = token;

                        self.item.permission_ids = $.map(self.permission_ids, function (val) {
                            return val.id;
                        });

                        if (self.item.id) {
                            self.$parent.update(self.item, self.item.id);
                        } else {
                            self.$parent.store(self.item);
                        }

                    }
                });
            }
        },

        ready: function () {
            this.$parent.formElement = $('#newRoom');
        },

        components: { Multiselect }
    }
</script>