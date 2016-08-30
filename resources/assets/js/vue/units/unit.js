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

            UnitService.store(params).then((response) => {
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

        update: function (params, id) {
            var self = this;
            UnitService.update(params, id).then((response) => {
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
            self.modalTitle = 'Sửa thông tin đơn vị tính';

            UnitService.edit(id).then(function(response) {
                self.unit = response.unit;
            });
        },

        destroy: function(id, unit) {
            var self = this;
            swal({
                title: "Bạn có chắc chắn không?",
                text: "Bản ghi có tên "+ unit.name + " sẽ bị xóa",
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
                        self.unit = response.unit;
                    });

                    swal("Đã xóa!", "Bản ghi có tên " + unit.name, "success");
                }
            });
        },

        validate: function()
        {
            var self = this;
            this.$validate(true, function () {
                if (self.$validation.invalid) { return; }

                if (self.unit.id) {
                    self.update(self.unit, self.unit.id);
                } else {
                    self.store(self.unit);
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