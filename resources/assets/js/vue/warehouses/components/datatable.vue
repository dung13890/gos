<template>
    <table class="table table-condensed table-default table-bordered table-hover" id="table-index" width="100%">
        <thead>
            <tr class="active">
                <th width="80" class="text-center">Mã</th>
                <th>Tên kho hàng</th>
                <th width="300">Tên chủ kho</th>
                <th width="300">Thuộc chi nhánh</th>
                <th width="80" class="text-center">Thao tác</th>
            </tr>

            <tr style=" background: #e3eff1;">
                <td><input type="text" v-model="code" class="form-control input-sm" /></td>
                <td><input type="text" v-model="name" class="form-control input-sm" /></td>
                <td><input type="text" v-model="user" class="form-control input-sm" /></td>
                <td>
                    <select v-model="branch" class="form-control input-sm">
                        <option value="" selected>--Chọn--</option>
                        <option v-for="branch in branches" :value="branch.id">{{ branch.name }}</option>
                    </select>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-info btn-filter" v-on:click.prevent="search">
                        <span class="glyphicon glyphicon-search"></span> Tìm kiếm
                    </button>

                    <button type="button" class="btn btn-danger btn-filter" v-on:click.prevent="reset">
                        <span class="glyphicon glyphicon glyphicon-ban-circle"></span> Reset
                    </button>
                </td>
            </tr>
        </thead>
    </table>
</template>

<script>
    export default {
        props: {
            branches: [],
        },

        data: function () {
            var self = this;

            return {
                route: {
                    url: window.laroute.route('api.v1.warehouses.index'),
                    data: function (warehouse) {
                        warehouse.code = self.code;
                        warehouse.name = self.name;
                        warehouse.user = self.user;
                        warehouse.branch = self.branch;
                    }
                },
                
                columns: [
                    {data: 'code', name: 'code'},
                    {data: 'name', name: 'name'},
                    {data: 'user', name: 'user'},
                    {data: 'branch', name: 'branch'},
                    {data: 'actions', name: 'actions', orderable: false, searchable: false, sClass: "text-center"}
                ],

                code: '',
                name: '',
                user: '',
                branch: '',
            }
        },

        methods: {
            tableRender: function () {
                this.$parent.oTable = renderTable(this.route, this.columns);
            },

            edit: function (id) {
                this.$parent.edit(id);
            },

            destroy: function(id, code) {
                this.$parent.destroy(id, code);
            },

            search: function () {
                this.$parent.oTable.draw();
            },

            reset: function () {
                this.$set('name', '');
                this.$set('code', '');
                this.$set('code', '');
                this.$set('user', '');
                this.$set('branch', '');
                
                this.$parent.oTable.draw();
            }
        },

        ready: function () {
            this.tableRender();
        }
    }
</script>