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
                code: '',
                name: '',
            },
            
            positions: { },

            modalTitle: '',

            errors: {},

            isError: false,
            
            form: '',
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
        }
    },

    ready: function () {
        var self = this;
        PositionService.index().then(function(response) {
            self.positions = response.positions;
        });
    }
});