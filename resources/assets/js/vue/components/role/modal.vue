<template>
    <div id="new-role" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Thêm mới nhóm quyền</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="required-wrapper">
                                    <input type="text" class="form-required input-sm" placeholder="Tên nhóm quyền" />
                                    <span class="fa fa-exclamation"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <textarea name="" id="" class="form-control input-sm" rows="5" placeholder="Mô tả"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label class="lineside text-center title-permission">
                                    <span class="text">Những quyền hạn được phép</span>
                                </label>

                                <div class="col-xs-6 list-permission" v-for="chunks in permissions">
                                    <div class="permission-onoff" v-for="permission in chunks">
                                        {{ permission.name }} <input type="checkbox" class="on-off" name="my-checkbox" data-size="mini" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <a v-on:click="postForm" class="btn btn-success">
                                <span class="glyphicon glyphicon-floppy-disk"></span> Lưu
                            </a>

                            <button class="btn btn-info" type="submit">
                                <span class="glyphicon glyphicon-floppy-disk"></span> Lưu và thêm mới
                            </button>

                            <button class="btn btn-warning" type="reset"><i class="glyphicon glyphicon-ban-circle"></i> Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            item: {}
        },
        data: function () {
            return {
                permissions: {},
            }
        },
        methods: {
            getPermission: function () {
                var self = this;
                this.$parent.RoleService.getPermission().then((permissions) => self.permissions = permissions).then(() => {
                  bootstrapSwitch($('.on-off'));
                });
            },
            postForm: function () {

            }
        },
        ready: function () {
            this.getPermission();
        },
    }
</script>