<div id="profile" v-el:profile class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Thông tin tài khoản</h4>
            </div>
            <div class="modal-body">
                <validator name="validation" :classes="{ touched: 'touched-validator', dirty: 'dirty-validator' }">
                    <form class="form-horizontal"> 
                        <div class="form-group">
                            <label for="username" class="col-sm-3">Tài khoản</label>
                            <div class="col-sm-9">
                                <input type="text" disabled="true" class="form-control input-sm">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="col-sm-3">Email</label>
                            <div class="col-sm-9">
                                <input type="text" disabled="true" class="form-control input-sm">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-3">Họ và tên</label>
                            <div class="col-sm-9">
                                <input type="text" v-validate:fullname="rules" v-model="value.fullname" :value="item.fullname" class="form-control input-sm">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3">Giới tính</label>
                            <div class="col-sm-9">
                                <label class="radio-inline"><input type="radio" value="1" :checked="item.gender == 1" v-model="value.gender">  Nam</label>
                                <label class="radio-inline"><input type="radio" value="2" :checked="item.gender == 2" v-model="value.gender">  Nữ</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone" class="col-sm-3">Điện thoại</label>
                            <div class="col-sm-9">
                                <input type="text" v-validate:phone="rules" v-model="value.phone" :value="item.phone" class="form-control input-sm"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="address" class="col-sm-3">Địa chỉ</label>
                            <div class="col-sm-9">
                                <input type="text" v-validate:address="rules" v-model="value.address" :value="item.address" class="form-control input-sm" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="avatar" class="col-sm-3">Ảnh đại diện</label>
                            <div class="col-sm-9">
                                <input type="file" class="filestyle" v-on:change="onFileChange" data-badge="false" data-size="sm" />
                                <br>
                                <div v-if="item.image_thumbnail && !image" />
                                    <img class="img-responsive" :src="renderImage(item.image_thumbnail)">
                                </div>
                                <div v-else>
                                    <img class="img-responsive" :src="image">
                                </div>
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
</div></div>