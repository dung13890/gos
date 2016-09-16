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
            location_id: [],

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
            this.location_id = [],
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

        update: function (params, id) {
            var self = this;
            BranchService.update(params, id).then((response) => {
                toastr.success(response.message);

                if (response.code === 200) {
                    self.reload();
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
            self.modalTitle = 'Sửa thông tin chi nhánh';

            BranchService.edit(id).then(function(response) {
                self.item = response.branch;
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

        validate: function() {
            var self = this;
            this.$validate(true, function () {
                if (self.$validation.invalid) { return; }

                if (self.branch.id) {
                    self.update(self.branch, self.branch.id);
                } else {
                    self.store(self.branch);
                }
            });
        },

        reload: function() {
            setTimeout(function() {
                window.location.reload();
            }, 1000);
        },

        locationSelected: function(selected) {
            var self = this;
            this.selected = selected
            self.branch.locations_selected = this.selected;
        }
    },
    
    ready: function () {
        var self = this;
        BranchService.create().then(function(response) {
            self.locations = response.locations;
        });
    }
});