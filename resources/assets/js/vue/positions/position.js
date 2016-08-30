import Vue from 'vue'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import PositionService from '../services/position';

Vue.use(VueResource)
Vue.use(VueValidator)

var token = $('meta[name="csrf-token"]').attr('content')

new Vue({
    el: '#PositionsController',

    data: function () {
        return {
            position: {
                id: '',
                code: '',
                name: '',
            },
            positions: {},
            
            modalTitle: '',
            errors: {},
            isError: false,
        }
    },

    created: function () {
        PositionService.setRouter(window.laroute);
        PositionService.setHttp(this.$http);
    },

    methods: {
        create: function() {
            var self = this;
            
            self.position = {};
            self.errors = {};
            self.isError = false;

            self.modalTitle = 'Thêm mới chức vụ';
        },

        store: function(params) {
            var self = this;
            PositionService.store(params).then((response) => {
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

        destroy: function(id, position) {
            var self = this;

            swal({
                title: "Bạn có chắc chắn không?",
                text: "Bản ghi có mã "+ position.name + " sẽ bị xóa",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Đồng ý!",
                cancelButtonText: 'Hủy',
                closeOnConfirm: false
            }, function(isConfirm) {
                if (isConfirm) {
                    self.positions.$remove(position);
                    PositionService.destroy(id).then(function(response) {
                        self.position = response.position;
                    });

                    swal("Đã xóa!", "Bản ghi có mã " + position.code, "success");
                }
            });
        },

        validate: function()
        {
            var self = this;

            this.$validate(true, function () {
                
                if (self.$validation.invalid) { return; }

                if (self.position.id) {
                    self.update(self.position, self.position.id);
                } else {
                    self.store(self.position);
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
        PositionService.index().then(function(response) {
            self.positions = response.positions;
        });
    }
});
