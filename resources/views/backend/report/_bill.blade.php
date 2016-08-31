<div id="list-bill" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Danh sách hóa đơn của sản phẩm có mã: SP0123</h4>
            </div>
            <div class="modal-body">
                <table class="table table-condensed table-default table-bordered table-hover" name="test">
                    <thead>
                        <tr class="active">
                            <th class="text-center">STT</th>
                            <th class="text-center">Chứng từ</th>
                            <th>Ngày chứng từ</th>
                            <th class="text-center">Đầu kỳ</th>
                            <th>Nhập</th>
                            <th>Xuất</th>
                            <th>Cuối kỳ</th>
                            <th></th>
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
                                <td>5</td>
                                <td><a href="">Xem</a></td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>