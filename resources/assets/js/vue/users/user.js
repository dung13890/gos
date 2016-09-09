import Vue from 'vue'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import UserService from '../services/user'

import DataTable from './components/datatable.vue';
import ModalForm from './components/modal-form.vue';

Vue.use(VueResource)
Vue.use(VueValidator)

new Vue({
    el: '#UsersController',

    components: { DataTable, ModalForm },

    data: function () {
        return {
            item: {
                _token: '',
                id: '',
                code: '',
                fullname: '',
                username: '',
                password: '',
                email: '',
                phone: '',
                address: '',
                birthday: null,
                image: '',
                gender: 1,
                position_id: ''
            },

            positions: [],
            rooms: [],
            permissions: [],
            roles: [],

            formElement: {},
            errors: {},
            oTable: {
                type: Object
            }
        }
    },

    created: function () {
        UserService.setRouter(window.laroute);
        UserService.setHttp(this.$http);
    },

    methods: {

        create: function() {
            this.formElement.modal('show');
            this.item = {};
            this.modalTitle = 'Thêm mới người dùng';
        },

        store: function(params) {
            var self = this;

            UserService.store(params).then((response) => {
                if (response.code === 200) {
                    toastr.success(response.message);
                    $('#newUser').modal('hide');
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
            self.createAction = false;

            UserService.edit(id).then(function(response) {
                self.user = response.user;
                self.user.rooms_selected = response.user.rooms;
                self.user.permissions_selected = response.user.permissions;
                self.user.roles_selected = response.user.roles;
            });
        },

        update: function (params, id) {
            var self = this;
            UserService.update(params, id).then((response) => {
                toastr.success(response.message);

                if (response.code === 200) {
                    $('#newUser').modal('hide');
                    self.oTable.draw();
                }

            }, (response) => {
                if (response.errors) {
                    self.errors = response.messages;
                    self.isError = response.errors
                }
            });
        },

        destroy: function(id, name) {
            var self = this;
            swal({
                title: "Bạn có chắc chắn không ?",
                text: "Bản ghi có tên "+ name + " sẽ bị xóa",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Đồng ý!",
                cancelButtonText: 'Hủy',
                closeOnConfirm: true
            }, function(isConfirm) {
                if (isConfirm) {
                    UserService.destroy(id).then(function(response) {
                        self.oTable.draw();
                    });

                    swal("Đã xóa!", "Bản ghi có tên " + name, "success");
                }
            });
        },
    },

    ready: function () {
        var self = this;

        UserService.index().then(function(response) {
            self.positions = response.positions;
            self.rooms = response.rooms;
            self.permissions = response.permissions;
            self.roles = response.roles;
        });
    },

});
