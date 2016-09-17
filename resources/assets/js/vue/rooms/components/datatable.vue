<template>
<div class="widget-content">
    <div class="table-responsive">
        <table class="table table-condensed table-default table-bordered table-hover" id="table-index" width="100%">
            <thead>
                <tr>
                    <th style="display:none">ID</th>
                    <th class="text-center" width="100">Mã</th>
                    <th>Tên phòng</th>
                    <th>Số nhân viên</th>
                    <th>Ngày thành lập</th>
                    <th width="100">Thao tác</th>
                </tr>
                <tr style="background: #e3eff1;">
                    <td style="display:none"></td>
                    <td><input type="text" v-model="code" class="form-control input-sm" /></td>
                    <td><input type="text" v-model="name" class="form-control input-sm" /></td>
                    <td class="text-right" colspan="3">
                        <a v-on:click.prevent="search"class="btn btn-info input-sm btnForFilter">
                            <span class="glyphicon glyphicon-search"></span> Tìm kiếm
                        </a>
                        <a v-on:click.prevent="reset" class="btn btn-danger input-sm btnForFilter">
                            <span class="glyphicon glyphicon glyphicon-ban-circle"></span> Reset
                        </a>
                    </td>
                </tr>
            </thead>
        </table>
    </div>
</div>
</template>

<script>
    export default {
        data: function () {
            var self = this;
            return {
                route: {
                    url: window.laroute.route('api.v1.rooms.data'),
                    data: function (d) {
                        d.code = self.code;
                        d.name = self.name;
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'code', name: 'code'},
                    {data: 'name', name: 'name'},
                    {data: 'member', name: 'member', orderable: false},
                    {data: 'founding', name: 'founding'},
                    {data: 'actions', name: 'actions', orderable: false, searchable: false, sClass: "text-center"}
                ],
                code: '',
                name: '',
            }
        },

        methods: {
            tableRender: function () {
                var self = this;
                this.$parent.oTable = renderTable(this.route, this.columns, {
                    createdRow: function (row, data, index) {
                        $('td', row).eq(0).css('display', 'none');
                        var actions = data.actions;

                        if (! actions || actions.length < 1) {
                            return ;
                        }

                        var actionHtml = $('td', row).eq(5);

                        actionHtml.html('');

                        if (actions.edit) {
                            var edit = actionHtml.append('<a href="#" v-on:click.prevent="edit('+data.id+')" title="Sửa" class="btn-icon label-edit"><span class="glyphicon glyphicon-edit"></span></a>');
                            self.$compile(edit.get(0));
                        }

                        if (actions.delete) {
                            var destroy = actionHtml.append('<a href="#" title="Xóa" class="btn-icon label-delete btn-xs" v-on:click="destroy(' + data.id + ', \'' + data.name + '\')" ><span class="glyphicon glyphicon-remove-circle"></span></a>');
                            self.$compile(destroy.get(0));
                        }
                    }
                });
            },

            edit: function (id) {
                this.$parent.edit(id);
            },

            destroy: function(id, name) {
                this.$parent.destroy(id, name);
            },

            search: function () {
                this.$parent.oTable.draw();
            },

            reset: function () {
                this.$set('code', '');
                this.$set('name', '');
                this.$parent.oTable.draw();
            },
        },

        ready: function () {
            this.tableRender();
        }
    }

</script>
