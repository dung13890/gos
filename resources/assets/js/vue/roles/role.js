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
            this.modalTitle = 'Thêm mới nhóm quyền';
        },

        store: function(params) {
            var self = this;

            RoleService.store(params).then((response) => {

                if (response.code === 200) {
                    toastr.success(response.message);
                    this.formRole.modal('hide');
                    self.oTable.draw();
                } else {
                    toastr.error(response.message);
                }

            }, (response) => {
                if (response.errors) {
                    self.errors = response;
                }
            });
        },

        edit: function(id) {
            var self = this;
            this.formRole.modal('show');
            this.modalTitle = 'Cập nhật quyền';

            RoleService.edit(id).then(function(response) {
                self.role = response.item;
            });
        },

        update: function (params, id) {
            var self = this;
            RoleService.update(params, id).then((response) => {
                if (response.code === 200) {
                    toastr.success(response.message);
                    this.formRole.modal('hide');
                    self.oTable.draw();
                } else {
                    toastr.error(response.message);
                }

            }, (response) => {
                if (response.errors) {
                    self.errors = response;
                }
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
                closeOnConfirm: true
            }, function(isConfirm) {
                if (isConfirm) {
                    RoleService.destroy(id).then(function(response) {
                        self.oTable.draw();
                    });

                    swal("Đã xóa!", "Bản ghi có tên " + name, "success");
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
