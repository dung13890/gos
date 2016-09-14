import Vue from 'vue'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import LocationService from '../services/location';

import DataTable from './components/datatable.vue';

Vue.use(VueResource)
Vue.use(VueValidator)

var token = $('meta[name="csrf-token"]').attr('content');

new Vue({
    el: '#LocationsController',

    components: {DataTable},

    data: function () {
        return {
            location: {
                _token: '',
                id: '',
                code: '',
                name: '',
                description: '',
            },

            locations: [],
            modalShow: true,
            modalTitle: '',
            createAction: true,
            errors: {
                errors: false,
                messages: {},
            },
            formRole: {},
            oTable: {
                type: Object
            }
        }
    },

    created: function() {
        LocationService.setRouter(window.laroute);
        LocationService.setHttp(this.$http);
    },

    methods: {
        create: function() {
            var self = this;

            self.modalTitle = 'Thêm mới địa điểm';
        },

        store: function(params) {
            var self = this;
            LocationService.store(params).then((response) => {
                if (response.code === 200) {
                    toastr.success(response.message);
                    self.reload();
                } else {
                    console.log(response);
                    toastr.error(response.message);
                }

            }, (response) => {
                if (response.errors) {
                    self.errors = response;
                }
            });
        },

        validate: function() {
            var self = this;

            self.location._token = token;

            this.$validate(true, function () {
                if (self.$validation.invalid) {
                    return;
                }

                if (self.location.id) {
                    // update location
                } else {
                    self.store(self.location);
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
