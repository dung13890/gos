import Vue from 'vue'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import PermissionService from '../services/permission'
import DataTable from './components/datatable.vue'
import ModalForm from './components/modal-form.vue'

Vue.use(VueResource)
Vue.use(VueValidator)

var token = $('meta[name="csrf-token"]').attr('content')

new Vue({
    el: '#PermissionsController',
    components: { DataTable, ModalForm },
    data: function () {
        return {
            permission: {
                _token: '',
                id: '',
                name: '',
                slug: '',
                description: '',
                model: '',
            },
            modalTitle: '',
            errors: {},
            formPermission: {},
            oTable: {
                type: Object
            }
        }
    },

    created: function () {
        PermissionService.setRouter(window.laroute);
        PermissionService.setHttp(this.$http);
    },

    methods: {
        create: function() {
            this.formPermission.modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
            this.permission = {};
            this.modalTitle = 'Thêm mới quyền';
        },

        store: function(params) {
            var self = this;

            PermissionService.store(params).then((response) => {
                if (response.code === 200) {
                    toastr.success(response.message);
                    this.formPermission.modal('hide');
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
            this.formPermission.modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
            this.modalTitle = 'Cập nhật quyền';

            PermissionService.edit(id).then(function(response) {
                self.permission = response.item;
            });
        },

        update: function (params, id) {
            var self = this;
            PermissionService.update(params, id).then((response) => {

                if (response.code === 200) {
                    toastr.success(response.message);
                    this.formPermission.modal('hide');
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
                text: "Bản ghi có mã "+ name + " sẽ bị xóa",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Đồng ý!",
                cancelButtonText: 'Hủy',
                closeOnConfirm: true
            }, function(isConfirm) {
                if (isConfirm) {
                    PermissionService.destroy(id).then(function(response) {
                        self.oTable.draw();
                    });

                    swal("Đã xóa!", "Bản ghi có tên " + name, "success");
                }
            });
        },
    },
});
