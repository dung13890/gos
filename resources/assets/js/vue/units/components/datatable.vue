<template>
<div class="widget-content">
    <div class="table-responsive">
        <table class="table table-condensed table-default table-bordered table-hover" id="table-index" width="100%">
            <thead>
                <tr>
                    <th style="display:none">ID</th>
                    <th>Tên</th>
                    <th>Ký hiệu</th>
                    <th>Mô tả</th>
                    <th width="100">Thao tác</th>
                </tr>
                <tr style="background: #e3eff1;">
                    <td style="display:none"></td>
                    <td><input type="text" v-model="name" class="form-control input-sm" /></td>
                    <td><input type="text" v-model="short_name" class="form-control input-sm" /></td>
                    <td><input type="text" v-model="description" class="form-control input-sm" /></td>
                    <td class="text-right">
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
                    url: window.laroute.route('api.v1.units.index'),
                    data: function (d) {
                        d.name = self.name;
                        d.short_name = self.short_name;
                        d.description = self.description;
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'short_name', name: 'short_name'},
                    {data: 'description', name: 'description'},
                    {data: 'actions', name: 'actions', orderable: false, searchable: false, sClass: "text-center"}
                ],
                name: '',
                short_name: '',
                description: '',
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

                        var actionHtml = $('td', row).eq(4);

                        actionHtml.html('');

                        if (actions.edit) {
                            var edit = actionHtml.append('<a href="#" v-on:click.prevent="edit('+data.id+')" title="Sửa" class="btn-icon label-edit"><span class="glyphicon glyphicon-edit"></span></a>');
                            self.$compile(edit.get(0));
                        }

                        if (actions.delete) {
                            var destroy = actionHtml.append('<a href="#" title="Xóa" class="btn-icon label-delete btn-xs" v-on:click="destroy(' + data.id + ', \'' + data.short_name + '\')" ><span class="glyphicon glyphicon-remove-circle"></span></a>');
                            self.$compile(destroy.get(0));
                        }
                    }
                });
            },

            edit: function (id) {
                this.$parent.edit(id);
            },

            destroy: function(id, short_name) {
                this.$parent.destroy(id, short_name);
            },

            search: function () {
                this.$parent.oTable.draw();
            },

            reset: function () {
                this.$set('name', '');
                this.$set('short_name', '');
                this.$set('description', '');
                this.$parent.oTable.draw();
            },
        },

        ready: function () {
            this.tableRender();
        }
    }

</script>
