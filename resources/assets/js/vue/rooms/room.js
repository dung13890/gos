import Vue from 'vue'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import RoomService from '../services/room'

import DataTable from './components/datatable.vue';
import ModalForm from './components/modal-form.vue';

Vue.use(VueResource)
Vue.use(VueValidator)

new Vue({
    el: '#RoomsController',

    components: { DataTable, ModalForm },

    data: function () {
        return {
            item: {
                _token: '',
                id: '',
                code: '',
                name: '',
                description: '',
                organizational: '',
                manager: '',
                member: '',
                founding: null,
                branch_id: '',
            },

            branches: [],
            permissions: [],
            modalTitle: '',
            errors: {},
            formElement: {},
            permission_ids: [],
            oTable: {
                type: Object
            }
        }
    },

    created: function () {
        RoomService.setRouter(window.laroute);
        RoomService.setHttp(this.$http);
    },

    methods: {
        create: function() {
            var self = this;
            self.item = {};
            this.permission_ids = [];
            this.formElement.modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
            self.modalTitle = 'Thêm mới phòng ban';
        },

        store: function(params) {
            var self = this;
            RoomService.store(params).then((response) => {
                if (response.code === 200) {
                    toastr.success(response.message);
                    self.formElement.modal('hide');
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
            self.modalTitle = 'Sửa thông tin phòng ban';
            RoomService.edit(id).then(function(response) {
                self.item = response.item;
            });
            this.errors = {};
            this.formElement.modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        },

        update: function (params, id) {
            var self = this;
            RoomService.update(params, id).then((response) => {
                if (response.code === 200) {
                    toastr.success(response.message);
                    self.formElement.modal('hide');
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
                closeOnConfirm: false
            }, function(isConfirm) {
                if (isConfirm) {
                    RoomService.destroy(id).then(function(response) {
                        self.oTable.draw();
                    });

                    swal("Đã xóa!", "Bản ghi có mã " + name, "success");
                }
            });
        },
    },

    ready: function () {
        var self = this;
        RoomService.index().then(function(response) {
            self.branches = response.branches;
            self.permissions = response.permissions;
        });
    }
});
