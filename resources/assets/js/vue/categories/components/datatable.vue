<template>
<div class="widget-content">
    <div class="table-responsive">
        <table class="table table-condensed table-default table-bordered table-hover" id="table-index" width="100%">
            <thead>
                <tr>
                    <th style="display:none">ID</th>
                    <th>Tên Nhóm</th>
                    <th>Slug</th>
                    <th class="text-center">Thao tác</th>
                </tr>
                <tr style="background: #e3eff1;">
                    <td style="display:none"></td>
                    <td><input v-model="name" type="text" class="form-control input-sm" ></td>
                    <td><input v-model="slug" type="text" class="form-control input-sm" ></td>
                    <td class="text-right" colspan="2">
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
        props: {
            type : '',
        },

        data: function () {
            var self = this;
            return {
                route: {
                    url: window.laroute.route('api.v1.categories.type', {type: self.type}),
                    data: function (d) {
                        d.name = self.name;
                        d.slug = self.slug;
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'slug', name: 'slug'},
                    {data: 'actions', name: 'actions', orderable: false, searchable: false, sClass: "text-center"}
                ],
                name: '',
                slug: '',
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

                        var actionHtml = $('td', row).eq(3);

                        actionHtml.html('');

                        if (actions.edit) {
                            var edit = actionHtml.append('<a href="#" v-on:click="edit('+data.id+')" title="Sửa" class="btn-icon label-edit"><span class="glyphicon glyphicon-edit"></span></a>');
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
                this.$set('name', '');
                this.$set('slug', '');
                this.$parent.oTable.draw();
            },
        },

        ready: function () {
            this.tableRender();
        }
    }

</script>
