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

        create: function() {
            var self = this;
            self.errors = {};
            self.customer_group = {};

            self.modalTitle = 'Thêm mới nhóm khách hàng';
            $("#newGroupCustomer").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        },

        store: function(params) {
            var self = this;

            CustomerGroupService.store(params).then((response) => {
                if (response.code === 200) {
                    toastr.success(response.message);
                    $("#newGroupCustomer").modal('hide');
                    self.oTable.draw();
                } else {
                    toastr.error(response.message);
                }
            }, (response) => {
                if (response.errors) {
                    self.errors = response;
                }
            });
        },

        edit: function(id) {
            var self = this;
            self.errors = {};
            self.modalTitle = 'Sửa thông tin nhóm khách hàng';

            CustomerGroupService.edit(id).then(function(response) {
                self.customer_group = response.item;
            });
        },

        update: function(params, id) {
            var self = this;

            CustomerGroupService.update(params, id).then((response) => {
                if (response.code === 200) {
                    toastr.success(response.message);
                    $("#newGroupCustomer").modal('hide');
                    self.oTable.draw();
                } else {
                    toastr.error(response.message);
                }
            }, (response) => {
                if (response.errors) {
                    self.errors = response;
                }
            });
        },
        
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

        validate: function () {
            this.errors = {};
            var self = this;

            this.$validate(true, function () {
                if (self.$validation.invalid) {
                    self.isError = true;
                } else {
                    self.isError = false;
                    self.customer_group._token = token;

                    if (self.customer_group.id) {
                        self.update(self.customer_group, self.customer_group.id);
                    } else {
                        self.store(self.customer_group);
                    }
                }
            });
        }
    },

    ready: function () {
        var self = this;

        $(document).on("click", ".edit-entity", function() {
            var idWarehouse = parseInt($(this).attr('id'));
            
            $("#newGroupCustomer").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });

            self.edit(idWarehouse);
        });

        $(document).on("click", ".destroy-entity", function() {
            var idCustomerGroup = $(this).attr('id');
            var nameCustomerGroup = $(this).attr('name');
            
            self.destroy(idCustomerGroup, nameCustomerGroup);
        });
    }
});
