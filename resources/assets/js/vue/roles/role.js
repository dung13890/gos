import Vue from 'vue'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import RoleService from '../services/role';

Vue.use(VueResource)
Vue.use(VueValidator)

var token = $('meta[name="csrf-token"]').attr('content')

new Vue({
    el: '#RolesController',

    data: function () {
        return {
            role: {
                _token: '',
                id: '',
                name: '',
                description: '',
            },
            roles: {},
            
            formFilter: {
                name: '',
            },

            permissions: {},
            permissions_checked: [],

            createAction: true,
            errors: {},
            isError: false,
        }
    },

    created: function () {
        RoleService.setRouter(window.laroute);
        RoleService.setHttp(this.$http);
    },

    methods: {
        filter: function() {
            var self = this;
            
            RoleService.filter(self.formFilter).then(function(response) {
                self.roles = response.roles;
            });
        },

        create: function() {
            var self = this;
            self.errors = {};
            self.role = {};
            self.permissions_checked = [];
        },

        store: function(params) {
            var self = this;
            RoleService.store(params).then((response) => {
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
            RoleService.update(params, id).then((response) => {
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

        edit: function(id) {
            var self = this;

            RoleService.edit(id).then(function(response) {
                self.role = response.role;
                self.permissions_checked = response.permissions;
            });
        },

        destroy: function(id, role) {
            var self = this;

            swal({
                title: "Bạn có chắc chắn không?",
                text: "Bản ghi có tên "+ role.name + " sẽ bị xóa",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Đồng ý!",
                cancelButtonText: 'Hủy',
                closeOnConfirm: false
            }, function(isConfirm) {
                if (isConfirm) {
                    self.roles.$remove(role);
                    RoleService.destroy(id).then(function(response) {
                        self.role = response.role;
                    });

                    swal("Đã xóa!", "Bản ghi có tên " + role.code, "success");
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

        reload: function() {
            setTimeout(function() {
                window.location.reload();
            }, 1000);
        }
    },

    ready: function () {
        var self = this;

        RoleService.index().then(function(response) {
            self.roles = response.roles;
        });

        RoleService.permissions().then(function(response) {
            self.permissions = response.permissions;
        });
    }
});
