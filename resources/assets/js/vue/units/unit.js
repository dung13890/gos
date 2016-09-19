import Vue from 'vue'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import UnitService from '../services/unit';

import DataTable from './components/datatable.vue';
import ModalForm from './components/modal-form.vue';

Vue.use(VueResource)
Vue.use(VueValidator)

var token = $('meta[name="csrf-token"]').attr('content');

new Vue({
    el: '#UnitsController',

    components: { DataTable, ModalForm },

    data: function () {
        return {
            item: {
                id: '',
                name: '',
                short_name: '',
                description: '',
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
        UnitService.setRouter(window.laroute);
        UnitService.setHttp(this.$http);
    },

    methods: {
        create: function() {
            this.item = {};
            this.errors = {};
            this.formElement.modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
            this.modalTitle = 'Thêm mới đơn vị tính';
        },

        store: function(params) {
            var self = this;
            UnitService.store(params).then((response) => {
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
            this.modalTitle = 'Sửa thông tin đơn vị tính';
            this.errors = {};
            this.formElement.modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });

            UnitService.edit(id).then(function(response) {
                self.item = response.item;
            });
        },

        update: function (params, id) {
            var self = this;
            UnitService.update(params, id).then((response) => {

                if (response.code === 200) {
                    toastr.success(response.message);
                    self.formElement.modal('hide');
                    self.oTable.draw();
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
                text: "Bản ghi có ký hiệu "+ name + " sẽ bị xóa",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Đồng ý!",
                cancelButtonText: 'Hủy',
                closeOnConfirm: false
            }, function(isConfirm) {
                if (isConfirm) {
                    UnitService.destroy(id).then(function(response) {
                        self.oTable.draw();
                    });

                    swal("Đã xóa!", "Bản ghi có ký hiệu " + name, "success");
                }
            });
        },
    },
});