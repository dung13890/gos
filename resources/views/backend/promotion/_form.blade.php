<div id="newProduct" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Thêm mới chương trình khuyến mãi</h4>
            </div>
            <div class="modal-body">
                <form action="" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-12 form-field">
                            <div class="required-wrapper form-field">
                                <small>Mã chương trình khuyễn mãi</small>
                                <input type="text" class="form-control input-sm" placeholder="" style="width: 155px;" />
                                <span class="error">Vui lòng nhập mã</span>
                            </div>

                            <div class="required-wrapper form-field">
                                <small>Tên chương trình khuyễn mãi</small>
                                <input type="text" class="form-control input-sm" placeholder="" />
                                <span class="error">Vui lòng nhập tên</span>
                            </div>

                            <div class="required-wrapper form-field">
                                <div class="pull-left">
                                    <div class="has-feedback">
                                        <small>Ngày bắt đầu</small>
                                        <input type="text" class="form-control input-sm date-picker" style="width: 280px; z-index: 1;" />
                                        <i class="fa fa-calendar form-control-feedback"></i>
                                        <span class="error">Vui lòng chọn ngày bắt đầu</span>
                                    </div>
                                </div>

                                <div class="pull-right">
                                    <div class="has-feedback">
                                        <small>Ngày kết thúc</small>
                                        <input type="text" class="form-control date-picker input-sm" style="width: 280px; z-index: 1;" />
                                        <i class="fa fa-calendar form-control-feedback"></i>
                                        <span class="error">Vui lòng chọn ngày kết thúc</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="clearfix"></div>

                            <div class="required-wrapper form-field">
                                <div class="checkbox checkbox-success checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" checked />
                                    <label for="inlineCheckbox2">Kích hoạt</label>
                                </div>
                            </div>
                            
                            <div class="required-wrapper form-field">
                                <small>Nhóm sản phẩm</small>
                                <select name="" id="" class="form-control input-sm">
                                    <option value="">Chọn</option>
                                </select>
                            </div>

                            <div class="required-wrapper form-field">
                                <small>Đối tượng khách hàng</small>
                                <select name="" id="" class="form-control input-sm">
                                    <option value="">Chọn</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-success" type="button">
                            <span class="glyphicon glyphicon-floppy-disk"></span> Lưu
                        </button>

                        <button class="btn btn-warning">
                            <span class="glyphicon glyphicon-ban-circle"></span> Hủy
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>