import Vue from 'vue'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import UserService from '../services/user'

import ModalProfile from './components/modal-profile.vue'
import ModalPassword from './components/modal-password.vue'

Vue.use(VueResource)
Vue.use(VueValidator)

Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');

new Vue({
    el: '#headerApp',

    components: { ModalProfile, ModalPassword },

    data: function () {
        return {
            userProfile: {
                _token: '',
                id: '',
                fullname: '',
                phone: '',
                address: '',
                image_thumbnail: '',
                gender: '',
                birthday: ''
            },
            formElement: {},
            formPassword: {},
            errors: {},
        }
    },

    created: function () {
        UserService.setRouter(window.laroute);
        UserService.setHttp(this.$http);
    },

    methods: {
        profile: function () {
            var self = this;
            this.errors = {},
            UserService.profile().then(function (response) {
                self.userProfile = response;
            });
            self.formElement.modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });

        },

        password: function () {
            var self = this;
            this.errors = {},
            self.formPassword.modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        },

        updateProfile: function (params) {
            var self = this;
            UserService.updateProfile(params).then((response) => {
                if (response.code === 200) {
                    toastr.success(response.message);
                    self.reload();
                } else {
                    toastr.error(response.message);
                }
            }, (response) => {
                if (response.errors) {
                    self.errors = response;
                }
            });
        },

        changePassword: function (params) {
            var self = this;
            UserService.changePassword(params).then((response) => {
                if (response.code === 200) {
                    toastr.success(response.message);
                    self.reload();
                } else {
                    toastr.error(response.message);
                }
            }, (response) => {
                if (response.errors) {
                    self.errors = response;
                }
            });
        },

        reload: function() {
            setTimeout(function() {
                window.location.reload();
            }, 1000);
        }
    },

});
