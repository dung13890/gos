import Vue from 'vue'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import BranchService from '../services/branch'
import DataTable from './components/datatable.vue';
import ModalForm from './components/modal-form.vue';

Vue.use(VueResource)
Vue.use(VueValidator)

var token = $('meta[name="csrf-token"]').attr('content');

new Vue({
    el: '#BranchesController',
    
    components: { DataTable, ModalForm },

    data: function () {
        return {
            item: {
                id: '',
                code: '',
                name: '',
                address: '',
                phone: '',
                fax: '',
                status: ''
            },

            locations: [],
            location_ids: [],
            modalTitle: '',
            errors: {},
            formElement: {},
            oTable: {
                type: Object
            }
        }
    },

    created: function () {
        BranchService.setRouter(window.laroute);
        BranchService.setHttp(this.$http);
    },

    methods: {
        create: function() {
            this.item = {};
            this.location_ids = [],
            this.formElement.modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
            this.modalTitle = 'Thêm mới chi nhánh';
        },

        store: function(params) {
            var self = this;
            BranchService.store(params).then((response) => {
                if (response.code === 200) {
                    toastr.success(response.message);
                    self.formElement.modal('hide');
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
            this.modalTitle = 'Sửa thông tin chi nhánh';
            this.errors = {};
            this.formElement.modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });

            BranchService.edit(id).then(function(response) {
                self.item = response.item;
                self.location_ids = response.item.locations;
            });
        },

        update: function (params, id) {
            var self = this;
            BranchService.update(params, id).then((response) => {
                if (response.code === 200) {
                    toastr.success(response.message);
                    self.formElement.modal('hide');
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

        destroy: function(id, code) {
            var self = this;
            swal({
                title: "Bạn có chắc chắn không?",
                text: "Bản ghi có mã "+ code + " sẽ bị xóa",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Đồng ý!",
                cancelButtonText: 'Hủy',
                closeOnConfirm: false
            }, function(isConfirm) {
                if (isConfirm) {
                    BranchService.destroy(id).then(function(response) {
                        self.oTable.draw();
                    });

                    swal("Đã xóa!", "Bản ghi có mã " + code, "success");
                }
            });
        },
    },
    
    ready: function () {
        var self = this;
        BranchService.create().then(function(response) {
            self.locations = response.locations;
        });
    }
});