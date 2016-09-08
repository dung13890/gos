import Vue from 'vue'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import RoleService from '../services/role';

import DataTable from './components/datatable.vue';
import ModalForm from './components/modal-form.vue';

Vue.use(VueResource)
Vue.use(VueValidator)

var token = $('meta[name="csrf-token"]').attr('content')

new Vue({
    el: '#RolesController',

    components: { DataTable, ModalForm },

    data: function () {
        return {
            role: {
                _token: '',
                id: '',
                name: '',
                description: '',
            },
            
            permissions: [],
            permissions_checked: [],

            modalTitle: '',
            createAction: true,
            errors: {
                errors: false,
                messages: {}
            },
            formRole: {},
            oTable: {
                type: Object
            }
        }
    },

    created: function () {
        RoleService.setRouter(window.laroute);
        RoleService.setHttp(this.$http);
    },

    methods: {
        create: function() {
            this.formRole.modal('show');
            this.role = {};
            self.permissions_checked = [];
            this.modalTitle = 'Thêm mới nhóm quyền';
        },

        store: function(params) {
            var self = this;
            RoleService.store(params).then((response) => {
                toastr.success(response.message);

                if (response.code === 200) {
                    $('#newRole').modal('hide');
                    self.oTable.draw();
                }

            }, (response) => {
                if (response.errors) {
                    self.errors = response.messages;
                    self.isError = response.errors
                }
            });
        },

        update: function (params, id) {
            var self = this;
            RoleService.update(params, id).then((response) => {
                toastr.success(response.message);

                if (response.code === 200) {
                    $('#newRole').modal('hide');
                    self.oTable.draw();
                }

            }, (response) => {
                if (response.errors) {
                    self.errors = response.messages;
                    self.isError = response.errors
                }
            });
        },

        edit: function(id) {
            var self = this;

            RoleService.edit(id).then(function(response) {
                self.role = response.role;
                self.permissions_checked = response.permissions;
            });
        },

        destroy: function(id, name) {
            var self = this;

            swal({
                title: "Bạn có chắc chắn không?",
                text: "Bản ghi có tên "+ name + " sẽ bị xóa",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Đồng ý!",
                cancelButtonText: 'Hủy',
                closeOnConfirm: false
            }, function(isConfirm) {
                if (isConfirm) {
                    RoleService.destroy(id).then(function(response) {
                        self.oTable.draw();
                    });

                    swal("Đã xóa!", "Bản ghi có tên " + name, "success");
                }
            });
        },

        validate: function()
        {
            var self = this;
            
            this.$validate(true, function () {
                if (self.$validation.invalid) {
                    self.isError = true;
                } else {
                    self.role._token = token;
                    self.role.permissions_checked = self.permissions_checked;

                    if (self.role.id) {

                        self.update(self.role, self.role.id);
                    } else {
                        self.store(self.role);
                    }
                }
            });
        },
    },

    ready: function () {
        var self = this;

        RoleService.index().then(function(response) {
            self.permissions = response.permissions;
        });
    }
});
