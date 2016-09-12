import Vue from 'vue'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import LocationService from '../services/location';

import DataTable from './components/datatable.vue';
import ModalForm from './components/modal-form.vue';

Vue.use(VueResource)
Vue.use(VueValidator)

new Vue({
    el: '#LocationsController',

    components: {DataTable, ModalForm},

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
            modalTitle: '',
            createAction: true,
            errors: {
                errors: false,
                messages: {}
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
    }
});
