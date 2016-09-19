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
                _token: '',
                id: '',
                code: '',
                name: '',
                type: 1,
                note: '',
                user_id: '',
                branch_id: ''
            },

            branches: [],
            users: [],

            modalTitle: '',
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

    methods: {
        create: function() {
            var self = this;
            self.modalTitle = 'Thêm mới kho hàng';

            $("#newWarehouse").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });

            self.warehouse = {};
            self.errors = {};
        },

        edit: function(id) {
            var self = this;
            self.errors = {};
            self.modalTitle = 'Sửa thông tin kho hàng';

            WarehouseService.edit(id).then(function(response) {
                self.warehouse = response.item;
            });
        },

        store: function(params) {
            var self = this;

            WarehouseService.store(params).then((response) => {
                if (response.code === 200) {
                    toastr.success(response.message);
                    $("#newWarehouse").modal('hide');
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

        update: function(params, id) {
            var self = this;

            WarehouseService.update(params, id).then((response) => {
                if (response.code === 200) {
                    toastr.success(response.message);
                    $("#newWarehouse").modal('hide');
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
                    WarehouseService.destroy(id).then(function(response) {
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
                        self.warehouse._token = token;

                        if (self.warehouse.id) {
                            self.update(self.warehouse, self.warehouse.id);
                        } else {
                            self.store(self.warehouse);
                        }
                    }
                });
            }
    },

    ready: function () {
        var self = this;

        WarehouseService.index().then(function(response) {
            self.branches = response.branches;
            self.users = response.users;
        });

        $(document).on("click", ".edit-entity", function() {
            var idWarehouse = parseInt($(this).attr('id'));
            
            $("#newWarehouse").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });

            self.edit(idWarehouse);
        });

        $(document).on("click", ".destroy-entity", function() {
            var idWarehouse = $(this).attr('id');
            var nameWarehouse = $(this).attr('name');

            self.destroy(idWarehouse, nameWarehouse);
        });
    }
});
