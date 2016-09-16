import Vue from 'vue'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import WarehouseService from '../services/warehouse'
import DataTable from './components/datatable.vue';

Vue.use(VueResource)
Vue.use(VueValidator)

var token = $('meta[name="csrf-token"]').attr('content');

new Vue({
    el: '#WarehousesController',

    components: { DataTable },

    data: function () {
        return {
            warehouse: {
                id: '',
                code: '',
                name: '',
                type: '',
                note: '',
                user_id: '',
                branch_id: ''
            },

            branches: [
                {"id": 6,"name":"dsfdsf"},
                {"id":2,"name":"Flossie Lemke"},
                {"id":5,"name":"Josiah Sporer"},
                {"id":4,"name":"Miss Bria Keeling"},
                {"id":1,"name":"Mohammed VonRueden"}
            ],

            modalTitle: 'sadsad',
            errors: {},
            formElement: {},

            oTable: {
                type: Object
            }
        }
    },

    created: function () {
        WarehouseService.setRouter(window.laroute);
        WarehouseService.setHttp(this.$http);
    },

    ready: function () {
        var self = this;
        
        WarehouseService.index().then(function(response) {
            self.branches = response.branches;
        });
    }
});