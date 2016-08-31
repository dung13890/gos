<div id="show-bill" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Chi tiết hóa đơn: SP0123</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-4 form-field">
                    <div class="required-wrapper form-field">
                        <small><b>Người lập hóa đơn:</b> Phạm Kỳ Khôi</small>
                    </div>
                    
                    <div class="required-wrapper form-field">
                        <small><b>Ngày hóa đơn:</b> 20/10/2016</small>
                    </div>

                    <div class="required-wrapper form-field">
                        <small><b>Xuất tại kho:</b> Kho 1 Hà Nội</small>
                    </div>
                    
                    <div class="required-wrapper form-field">
                        <small><b>Chủ kho:</b> Hoàng Thùy Anh</small>
                    </div>
                </div>

                <div class="col-md-4 form-field">
                    <div class="required-wrapper form-field">
                        <small><b>Tên khách hàng:</b> Phạm Kỳ Anh</small>
                    </div>
                    
                    <div class="required-wrapper form-field">
                        <small><b>Địa chỉ:</b> Cầu Giấy - Hà Nội</small>
                    </div>

                    <div class="required-wrapper form-field">
                        <small><b>Điện thoại:</b> 0684353435</small>
                    </div>

                    <div class="required-wrapper form-field">
                        <small><b>Email:</b> aaa@gmail.com</small>
                    </div>

                    <div class="required-wrapper form-field">
                        <small><b>Nhóm KH:</b>VIP</small>
                    </div>

                    <div class="required-wrapper form-field">
                        <small><b>MST:</b>5654654654654</small>
                    </div>
                </div>

                <div class="col-md-4 form-field">
                    <div class="required-wrapper form-field">
                        <small><b>Tổng tiền hàng:</b> 1.000.000.000 vnđ</small>
                    </div>

                    <div class="required-wrapper form-field">
                        <small><b>Tích điểm:</b> Có</small>
                    </div>

                    <div class="required-wrapper form-field">
                        <small><b>Khuyến mãi:</b> 5.000.000 vnđ</small>
                    </div>

                    <div class="required-wrapper form-field">
                        <small><b>Đã thanh toán:</b> 500.000.000 vnđ</small>
                    </div>

                    <div class="required-wrapper form-field">
                        <small><b>Phải thu:</b> 400.900.000 vnđ</small>
                    </div>
                </div>

                <table class="table table-condensed table-default table-bordered table-hover" name="test">
                    <thead>
                        <tr class="active">
                            <th class="text-center">Mã hàng</th>
                            <th class="text-center">Tên hàng</th>
                            <th>Số lượng</th>
                            <th class="text-center">Đơn giá</th>
                            <th>Khuyến mãi</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>

                    <tbody>
                        @for ($i = 1; $i <= 5; $i++)
                            <tr>
                                <td class="text-center">{{ $i }}</td>
                                <td class="text-center">SP0123</td>
                                <td>Samsung Galaxy S3</td>
                                <td class="text-center">a</td>
                                <td>200</td>
                                <td>100</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>