<div id="password" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Đổi mật khẩu</h4>
            </div>
            <div class="modal-body">
                <validator name="validation" :classes="{ touched: 'touched-validator', dirty: 'dirty-validator' }">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="" class="col-sm-3">Mật khẩu cũ</label>
                            <div class="col-sm-9">
                                <input type="password" v-validate:old_password="rules" v-model="value.old_password" class="form-control input-sm"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3">Mật khẩu mới</label>
                            <div class="col-sm-9">
                                <input type="password" v-validate:password="rules" v-model="value.password" class="form-control input-sm"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3">Xác nhận lại</label>
                            <div class="col-sm-9">
                                <input type="password" v-validate:password_confirmation="rules" v-model="value.password_confirmation" class="form-control input-sm" />
                            </div>
                        </div>
                    </form>
                </validator>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy bỏ</button>
                <button type="button" v-on:click="postForm" class="btn btn-success">Xác nhận</button>
            </div>
        </div>
    </div>
</div>