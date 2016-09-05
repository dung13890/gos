import Vue from 'vue'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import PermissionService from '../services/permission'

Vue.use(VueResource)
Vue.use(VueValidator)

var token = $('meta[name="csrf-token"]').attr('content');

new Vue({
    el: '#PermissionsController',

    data: function () {
        return {
            permissions: {},

            permission: {
                _token: '',
                id: '',
                name: '',
                slug: '',
                description: '',
                model: '',
            },

            createAction: true,
            errors: {},
            isError: false,
        }
    },

    created: function () {
        PermissionService.setRouter(window.laroute);
        PermissionService.setHttp(this.$http);
    },

    methods: {
        create: function() {
            var self = this;
            self.permission = {};
            self.modalTitle = 'Thêm mới chi nhánh';
        },

        store: function(params) {
            var self = this;

            PermissionService.store(params).then((response) => {
                toastr.success(response.message);
                if (response.code === 200) {
                    self.reload();
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
            PermissionService.update(params, id).then((response) => {
                toastr.success(response.message);

                if (response.code === 200) {
                    self.reload();
                }

            }, (response) => {
                if (response.errors) {
                    self.errors = response.messages;
                    alert('OK');
                    console.log(response);
                    self.isError = response.errors
                }
            });
        },

        edit: function(id) {
            var self = this;
             createAction: false;

            PermissionService.edit(id).then(function(response) {
                self.permission = response.permission;
            });
        },

        destroy: function(id, permission) {
            var self = this;
            swal({
                title: "Bạn có chắc chắn không?",
                text: "Bản ghi có mã "+ permission.name + " sẽ bị xóa",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Đồng ý!",
                cancelButtonText: 'Hủy',
                closeOnConfirm: false
            }, function(isConfirm) {
                if (isConfirm) {
                    self.permissions.$remove(permission);
                    PermissionService.destroy(id).then(function(response) {
                        self.permission = response.permission;
                    });

                    swal("Đã xóa!", "Bản ghi có mã " + permission.name, "success");
                }
            });
        },

        validate: function() {
            var self = this;

            this.$validate(true, function () {
                if (self.$validation.invalid) {
                    self.isError = true;
                } else {
                    self.permission._token = token;

                    if (self.permission.id) {
                        self.update(self.permission, self.permission.id);
                    } else {
                        console.log(self.permission);
                        self.store(self.permission);
                    }
                }
            });
        },

        reload: function() {
            setTimeout(function() {
                window.location.reload();
            }, 1000);
        },
    },

    ready: function () {
        var self = this;

        PermissionService.index().then(function(response) {
            self.permissions = response.permissions;
        });
    }
});
