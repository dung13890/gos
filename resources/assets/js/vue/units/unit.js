import Vue from 'vue'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import UnitService from '../services/unit';

Vue.use(VueResource)
Vue.use(VueValidator)

var token = $('meta[name="csrf-token"]').attr('content');

new Vue({
    el: '#UnitsController',

    data: function () {
        return {
            unit: {
                id: '',
                code: '',
                name: '',
                short_name: '',
                description: '',
            },
            units: {},
            locations: {},
            modalTitle: '',
            errors: {},
            isError: false,
            options: ['list', 'of', 'options'],
        }
    },

    created: function () {
        UnitService.setRouter(window.laroute);
        UnitService.setHttp(this.$http);
    },

    methods: {
        create: function() {
            var self = this;
            self.branch = {};
            self.modalTitle = 'Thêm mới đơn vị tính';
        },

        store: function(params) {
            var self = this;

            BranchService.store(params).then((response) => {
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
            self.modalTitle = 'Sửa thông tin đơn vị tính';
            
            BranchService.edit(id).then(function(response) {
                self.branch = response.branch;
            });
        },

        destroy: function(id, unit) {
            var self = this;
            swal({
                title: "Bạn có chắc chắn không?",
                text: "Bản ghi có mã "+ unit.code + " sẽ bị xóa",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Đồng ý!",
                cancelButtonText: 'Hủy',
                closeOnConfirm: false
            }, function(isConfirm) {
                if (isConfirm) {
                    self.units.$remove(unit);
                    UnitService.destroy(id).then(function(response) {
                        self.unit = response.branch;
                    });

                    swal("Đã xóa!", "Bản ghi có mã " + unit.code, "success");
                }
            });
        },

        validate: function()
        {
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
        }
    },

    ready: function () {
        var self = this;
        UnitService.index().then(function(response) {
            self.units = response.units;
        });
    }
});