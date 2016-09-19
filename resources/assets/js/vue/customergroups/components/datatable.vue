<template>
    <table class="table table-condensed table-default table-bordered table-hover" id="table-index" width="100%">
        <thead>
            <tr class="active">
                <th width="5%" class="text-center">Mã</th>
                <th width="90%">
                    {{ type == "customer" ? 'Tên nhóm khách hàng' : 'Tên nhóm nhà cung cấp' }}
                </th>
                <th width="5%" class="text-center">Thao tác</th>
            </tr>

            <tr style=" background: #e3eff1;">
                <td><input type="text" v-model="code" class="form-control input-sm" /></td>
                <td><input type="text" v-model="name" class="form-control input-sm" /></td>
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
            type: '',
        },
        
        data: function () {
            var self = this;

            return {
                route: {
                    url: window.laroute.route('api.v1.customergroups.index', {type: self.type}),
                    data: function (customer_group) {
                        customer_group.code = self.code;
                        customer_group.name = self.name;
                    }
                },

                columns: [
                    {data: 'code', name: 'code'},
                    {data: 'name', name: 'name'},
                    {data: 'actions', name: 'actions', orderable: false, searchable: false, sClass: "text-center"}
                ],

                code: '',
                name: '',
            }
        },

        methods: {
            tableRender: function () {
                this.$parent.oTable = renderTable(this.route, this.columns);
            },

            search: function () {
                this.$parent.oTable.draw();
            },

            reset: function () {
                this.$set('code', '');
                this.$set('name', '');
                this.$parent.oTable.draw();
            }
        },

        ready: function () {
            this.tableRender();
        }
    }
</script>
