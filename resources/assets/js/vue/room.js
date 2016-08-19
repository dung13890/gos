import Vue from 'vue'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import RoomService from './services/room';
Vue.use(VueResource)
Vue.use(VueValidator)

var token = $('meta[name="csrf-token"]').attr('content')
new Vue({
    el: '#newProvider',

    data: function () {
        return {
            room: {
                name: '',
                description: ''
                organizational: '',
                manager: '',
                member: '',
                founding: '',
                branch_id: '',
            },
            errors: {},
            isError: false,
        }
    },

    methods: {
        submitForm: function () {
            var self = this;
            var formData = new FormData();
            formData.append('_token', token);

            this.$validate(true, function () {
                if (self.$validation.invalid) {
                    return;
                }

                formData.append('name', self.room.name);
                formData.append('description', self.room.description);
                formData.append('manager', self.room.manager);
                formData.append('member', self.room.member);
                formData.append('founding', self.room.founding);
                formData.append('branch_id', self.room.branch_id);

                RoomService.storeRoom(formData).then((response) => {
                    toastr.success(response.message);
                }, (errors) => {
                    if (errors.errors) {
                        self.isError = true;
                        self.errors = errors.errors;
                    }
                });
            })
        }
    },

    created: function () {
        RoomService.setRouter(window.laroute);
        RoomService.setHttp(this.$http);
    },
});