import Vue from 'vue'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import RoomService from '../services/room'

Vue.use(VueResource)
Vue.use(VueValidator)

var token = $('meta[name="csrf-token"]').attr('content');

new Vue({
    el: '#RoomsController',

    data: function () {
        return {
            rooms: {},
            room: {
                _token: '',
                id: '',
                code: '',
                name: '',
                description: '',
                organizational: '',
                manager: '',
                member: '',
                founding: '',
                branch_id: '',
            },

            branches: [],

            modalTitle: '',
            errors: {},
            isError: false,
        }
    },

    created: function () {
        RoomService.setRouter(window.laroute);
        RoomService.setHttp(this.$http);
    },

    methods: {
        create: function() {
            var self = this;
            self.room = {};
            self.modalTitle = 'Thêm mới chi nhánh';
        },

        store: function(params) {
            var self = this;

            RoomService.store(params).then((response) => {
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
            RoomService.update(params, id).then((response) => {
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
            RoomService.edit(id).then(function(response) {
                self.room = response.room;
            });
        },

        destroy: function(id, room) {
            var self = this;
            swal({
                title: "Bạn có chắc chắn không?",
                text: "Bản ghi có mã "+ room.name + " sẽ bị xóa",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Đồng ý!",
                cancelButtonText: 'Hủy',
                closeOnConfirm: false
            }, function(isConfirm) {
                if (isConfirm) {
                    self.rooms.$remove(room);
                    RoomService.destroy(id).then(function(response) {
                        self.branch = response.branch;
                    });

                    swal("Đã xóa!", "Bản ghi có mã " + room.code, "success");
                }
            });
        },

        validate: function() {
            var self = this;
            this.$validate(true, function () {
                if (self.$validation.invalid) { return; }
                self.room._token = token;
                if (self.room.id) {
                    self.update(self.room, self.room.id);
                } else {
                    self.store(self.room);
                }
            });
        },

        reload: function() {
            setTimeout(function() {
                window.location.reload();
            }, 1000);
        },
    },

    ready: function () {
        var self = this;

        RoomService.index().then(function(response) {
            self.rooms = response.rooms;
            console.log(response.rooms);
            self.branches = response.branches;
            console.log(self.branches);
        });
    }
});
