import Vue from 'vue'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import UserService from '../services/user'

Vue.use(VueResource)
Vue.use(VueValidator)

var token = $('meta[name="csrf-token"]').attr('content');

new Vue({
    el: '#settingGeneral',

    data: function () {
        return {
            userProfile: {
                _token: '',
                id: '',
                fullname: '',
                phone: '',
                address: '',
                image: '',
                gender: ''
            },

            errors: {},
            isError: false
        }
    },

    created: function () {
        UserService.setRouter(window.laroute);
        UserService.setHttp(this.$http);
    },

    methods: {
        getUserProfile: function(user) {
            var self = this;
            self.userProfile = user;
        },

        updateProfile: function(params) {
            var self = this;
            
            UserService.updateProfile(params).then((response) => {
                toastr.success(response.message);
            }, (response) => {
                if (response.errors) {
                    self.errors = response.messages;
                    self.isError = response.errors
                }
            });
        },

        validate: function() {
            var self = this;

            this.$validate(true, function () {
                if (self.$validation.invalid) {
                    self.isError = true;
                } else {
                    self.userProfile._token = token;
                    self.updateProfile(self.userProfile);
                }
            });
        }
    }
});
