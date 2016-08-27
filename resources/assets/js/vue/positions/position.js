import Vue from 'vue'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import PositionService from '../services/position';

Vue.use(VueResource)
Vue.use(VueValidator)

var token = $('meta[name="csrf-token"]').attr('content')

new Vue({
    el: '#PositionsController',

    data: function () {
        return {
            position: {
                id: '',
                code: '',
                name: '',
            },
            
            positions: {},

            modalTitle: '',

            errors: {},

            isError: false,
        }
    },

    created: function () {
        PositionService.setRouter(window.laroute);
        PositionService.setHttp(this.$http);
    },

    methods: {
        create: function() {
            var self = this;
            self.modalTitle = 'Thêm mới chức vụ';
        },

        store: function(params) {
            PositionService.store(params).then((response) => {
                toastr.success(response.message);

                if (response.code === 200) {
                    window.location.reload();
                }

            }, (response) => {
                if (response.errors) {
                    self.isError = true;
                    self.errors = response.errors;
                }
            });
        },

        edit: function(id) {
            var self = this;
            self.modalTitle = 'Sửa thông tin chức vụ';

            PositionService.edit(id).then(function(response) {
                self.positions = response.positions;
            });
        },

        destroy: function(id) {
            alert(id);
        },

        validate: function()
        {
            var self = this;
            var params = new FormData();
            params.append('_token', token);

            this.$validate(true, function () {
                if (self.$validation.invalid) { return; }

                params.append('code', self.position.code);
                params.append('name', self.position.name);

                self.store(params);
            });
        }
    },

    ready: function () {
        var self = this;
        PositionService.index().then(function(response) {
            self.positions = response.positions;
        });
    }
});