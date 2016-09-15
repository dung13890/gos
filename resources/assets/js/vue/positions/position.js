import Vue from 'vue'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import PositionService from '../services/position';

import DataTable from './components/datatable.vue';
import ModalForm from './components/modal-form.vue';

Vue.use(VueResource)
Vue.use(VueValidator)

var token = $('meta[name="csrf-token"]').attr('content')

new Vue({
    el: '#PositionsController',

    components: { DataTable, ModalForm },

    data: function () {
        return {
            item: {
                id: '',
                code: '',
                name: '',
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
        PositionService.setRouter(window.laroute);
        PositionService.setHttp(this.$http);
    },

    methods: {
        create: function() {

            this.formElement.modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
            this.item = {};
            this.errors = {};
            this.modalTitle = 'Thêm mới chức vụ';
        },

        store: function(params) {
            var self = this;
            PositionService.store(params).then((response) => {
                if (response.code === 200) {
                    toastr.success(response.message);
                    this.formElement.modal('hide');
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
            this.formElement.modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
            self.modalTitle = 'Sửa thông tin chức vụ';
            
            PositionService.edit(id).then(function(response) {
                self.item = response.item;
            });
        },

        update: function (params, id) {
            var self = this;
            PositionService.update(params, id).then((response) => {
                if (response.code === 200) {
                    toastr.success(response.message);
                    this.formElement.modal('hide');
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
                    PositionService.destroy(id).then(function(response) {
                        self.oTable.draw();
                    });

                    swal("Đã xóa!", "Bản ghi có mã " + code, "success");
                }
            });
        },

    },
});
