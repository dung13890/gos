import Vue from 'vue';
import VueResource from 'vue-resource';
import VueValidator from 'vue-validator';
import Multiselect from 'vue-multiselect';
import LocationService from '../services/location';

import DataTable from './components/datatable.vue';

Vue.use(VueResource)
Vue.use(VueValidator)

var token = $('meta[name="csrf-token"]').attr('content');

new Vue({
    el: '#LocationsController',

    components: { DataTable, Multiselect },

    data: function () {
        return {
            location: {
                _token: '',
                id: '',
                code: '',
                name: '',
                description: '',
            },

            locations: [],
            branches: [],
            branch_ids: [],
            isError: false,
            modalShow: true,
            modalTitle: '',
            createAction: true,
            errors: {
                errors: false,
                messages: {},
            },
            formRole: {},
            oTable: {
                type: Object
            }
        }
    },

    created: function() {
        LocationService.setRouter(window.laroute);
        LocationService.setHttp(this.$http);

        var self = this;
        $.get(window.laroute.route('api.v1.branches.index'), function(response) {
            self.branches = response.data;
        });
    },

    methods: {
        branchSelected: function(selected) {
            this.branch_ids = selected;
        },

        create: function() {
            var self = this;
            self.modalTitle = 'Thêm mới địa điểm';
        },

        store: function(params) {
            var self = this;
            LocationService.store(params).then((response) => {
                if (response.code === 200) {
                    toastr.success(response.message);
                    self.reload();
                } else {
                    toastr.error(response.errors);
                }

            }, (response) => {
                if (response.errors) {
                    self.errors = response;
                }
            });
        },

        edit: function(id) {
            var self = this;
            self.modalTitle = 'Sửa thông tin địa điểm';

            LocationService.edit(id).then(function(response) {
                self.location = response.item;
                self.branch_ids = response.branch_ids;
            });
        },

        update: function (params, id) {
            var self = this;

            LocationService.update(params, id).then((response) => {
                if (response.code === 200) {
                    toastr.success(response.message);
                    self.reload();
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
                text: "Địa điểm có mã "+ code + " sẽ bị xóa",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Đồng ý!",
                cancelButtonText: 'Hủy',
                closeOnConfirm: false
            }, function(isConfirm) {
                if (isConfirm) {
                    LocationService.destroy(id).then(function(response) {
                        self.oTable.draw();
                    });

                    swal("Đã xóa!", "Địa điểm có mã " + code, "success");
                }
            });
        },

        validate: function() {
            var self = this;

            self.location._token = token;

            this.$validate(true, function () {
                if (self.$validation.invalid) {
                    self.isError = true;
                    return;
                } else {
                    self.isError = false;
                }

                self.location.branch_ids = [];

                self.location.branch_ids = $.map(self.branch_ids, function (val) {
                    return val.id;
                });

                if (self.location.id) {
                    self.update(self.location, self.location.id)
                } else {
                    self.store(self.location);
                }
            });
        },

        reload: function() {
            setTimeout(function() {
                window.location.reload();
            }, 1000);
        }
    }
});
