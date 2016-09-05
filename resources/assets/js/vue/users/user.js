import Vue from 'vue'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import UserService from '../services/user'
import Multiselect from 'vue-multiselect'

Vue.use(VueResource)
Vue.use(VueValidator)

var token = $('meta[name="csrf-token"]').attr('content');

new Vue({
    el: '#UsersController',

    components: {
        'multiselect': Multiselect
    },

    data: function () {
        return {
            users: {},
            user: {
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
                position_id: '',
                rooms_selected: [],
                permissions_selected: [],
                roles_selected: [],
            },

            positions: [],
            rooms: [],
            permissions: [],
            roles: [],

            createAction: true,
            errors: {},
            isError: false,
        }
    },

    created: function () {
        UserService.setRouter(window.laroute);
        UserService.setHttp(this.$http);
    },

    methods: {
        create: function() {
            var self = this;
            self.room = {};
            self.createAction = true;
        },

        store: function(params) {
            var self = this;

            UserService.store(params).then((response) => {
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
            UserService.update(params, id).then((response) => {
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
            self.createAction = false;

            UserService.edit(id).then(function(response) {
                self.user = response.user;
                self.user.rooms_selected = response.user.rooms;
                self.user.permissions_selected = response.user.permissions;
                self.user.roles_selected = response.user.roles;
            });
        },

        destroy: function(id, user) {
            var self = this;
            swal({
                title: "Bạn có chắc chắn không?",
                text: "Bản ghi có tên "+ user.fullname + " sẽ bị xóa",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Đồng ý!",
                cancelButtonText: 'Hủy',
                closeOnConfirm: false
            }, function(isConfirm) {
                if (isConfirm) {
                    self.users.$remove(user);
                    UserService.destroy(id).then(function(response) {
                        self.fullname = response.user;
                    });

                    swal("Đã xóa!", "Bản ghi có tên " + user.fullname, "success");
                }
            });
        },

        validate: function() {
            var self = this;
            
            this.$validate(true, function () {
                if (self.$validation.invalid) {
                    self.isError = true;
                } else {
                    self.user._token = token;
                    
                    if (self.user.id) {
                        self.update(self.user, self.user.id);
                    } else {
                        self.store(self.user);
                    }
                }
            });
        },

        roomsSelected: function(selected) {
            var self = this;
            self.user.rooms_selected = selected;
        },

        permissionsSelected: function(selected) {
            var self = this;
            self.user.permissions_selected = selected;
        },

        rolesSelected: function(selected) {
            var self = this;
            self.user.roles_selected = selected;
        },

        reload: function() {
            setTimeout(function() {
                window.location.reload();
            }, 1000);
        },
    },

    ready: function () {
        var self = this;

        UserService.index().then(function(response) {
            self.users = response.users;
            self.positions = response.positions;
            self.rooms = response.rooms;
            self.permissions = response.permissions;
            self.roles = response.roles;
        });
    }
});
