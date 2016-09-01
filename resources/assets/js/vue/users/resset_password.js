import Vue from 'vue'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import UserService from '../services/user'

Vue.use(VueResource)
Vue.use(VueValidator)

var token = $('meta[name="csrf-token"]').attr('content');

new Vue({
    el: '#passwordReset',

    data: function () {
        return {
            user: {
                _token: '',
                id: '',
                old_password: '',
                password: '',
                password_confirmation: ''
            },

            errors: {},
            isError: false,
            isErrorServer: false
        }
    },

    created: function () {
        UserService.setRouter(window.laroute);
        UserService.setHttp(this.$http);
    },

    methods: {
        changePassword: function (params) {
            var self = this;

            UserService.changePassword(params).then((response) => {
                toastr.success(response.message);

                if (response.code === 200) {
                    self.reload();
                }
            }, (response) => {
                if (response.errors) {
                    self.errors = response.messages;
                    self.isErrorServer = response.errors;
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
                    self.changePassword(self.user);
                }
            });
        },

        reload: function() {
            setTimeout(function() {
                window.location.reload();
            }, 1000);
        }
    }
});
