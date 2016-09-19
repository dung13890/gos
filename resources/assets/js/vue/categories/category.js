import Vue from 'vue'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import CategoryService from '../services/category'
import DataTable from './components/datatable.vue'
import ModalForm from './components/modal-form.vue'

Vue.use(VueResource)
Vue.use(VueValidator)

var token = $('meta[name="csrf-token"]').attr('content');

new Vue({
    el: '#CategoryController',
    
    components: { DataTable, ModalForm },

    data: function () {
        return {
            item: {
                id: '',
                name: '',
                slug: '',
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
        CategoryService.setRouter(window.laroute);
        CategoryService.setHttp(this.$http);
    },

    methods: {
        create: function() {
            this.item = {};
            this.formElement.modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
            this.modalTitle = 'Thêm mới';
        },

        store: function(params) {
            var self = this;
            CategoryService.store(params).then((response) => {
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

            CategoryService.edit(id).then(function(response) {
                self.item = response.item;
            });
        },

        update: function (params, id) {
            var self = this;
            CategoryService.update(params, id).then((response) => {
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
                    CategoryService.destroy(id).then(function(response) {
                        self.oTable.draw();
                    });

                    swal("Đã xóa!", "Bản ghi có tên " + name, "success");
                }
            });
        },
    },
});