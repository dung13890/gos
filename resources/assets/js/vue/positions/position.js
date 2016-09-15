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
            this.position = {};
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

        update: function (params, id) {
            var self = this;
            PositionService.update(params, id).then((response) => {
                toastr.success(response.message);

                if (response.code === 200) {
                    self.reload();
                }

            }, (response) => {
                if (response.errors) {
                    self.errors = response.messages;
                    self.isError = response.errors
                }
            });
        },

        edit: function(id) {
            var self = this;
            self.modalTitle = 'Sửa thông tin chức vụ';
            
            PositionService.edit(id).then(function(response) {
                self.position = response.position;
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
