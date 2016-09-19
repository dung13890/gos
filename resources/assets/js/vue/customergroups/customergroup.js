import Vue from 'vue'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import CustomerGroupService from '../services/customergroup'
import DataTable from './components/datatable.vue';

Vue.use(VueResource)
Vue.use(VueValidator)

var token = $('meta[name="csrf-token"]').attr('content');

new Vue({
    el: '#GroupCustomersController',

    components: { DataTable },

    data: function () {
        return {
            customer_group: {
                _token: '',
                id: '',
                code: '',
                name: '',
                type: 'CUSTOMER',
            },

            modalTitle: '',
            errors: {},
            formElement: {},
            oTable: {
                type: Object
            }
        }
    },

    created: function () {
        CustomerGroupService.setRouter(window.laroute);
        CustomerGroupService.setHttp(this.$http);
    },

    methods: {
        destroy: function(id, name) {
            var self = this;
            swal({
                title: "Bạn có chắc chắn không?",
                text: "Bản ghi có tên "+ name + " sẽ bị xóa",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Đồng ý!",
                cancelButtonText: 'Hủy',
                closeOnConfirm: false
            }, function(isConfirm) {
                if (isConfirm) {
                    CustomerGroupService.destroy(id).then(function(response) {
                        self.oTable.draw();
                    });

                    swal("Đã xóa!", "Bản ghi có tên " + name, "success");
                }
            });
        },
    },

    ready: function () {
        var self = this;

        // $(document).on("click", ".edit-entity", function() {
        //     var idWarehouse = parseInt($(this).attr('id'));
            
        //     $("#newGroupCustomer").modal({
        //         backdrop: 'static',
        //         keyboard: false,
        //         show: true
        //     });

        //     self.edit(idWarehouse);
        // });

        $(document).on("click", ".destroy-entity", function() {
            var idCustomerGroup = $(this).attr('id');
            var nameCustomerGroup = $(this).attr('name');
            
            self.destroy(idCustomerGroup, nameCustomerGroup);
        });
    }
});
