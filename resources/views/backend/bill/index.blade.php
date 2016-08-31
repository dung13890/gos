@extends('layouts.backend')

@section('page-content')
    @include('backend.customer._form')
    <div id="content">
        <div class="container-fluid">
            <h3>Quản lý chứng từ</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="widget">
                        <!-- widget-heading -->
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Danh sách chứng từ</h1>
                            <a href="javascript:;" class="toggle-content" references="#productList" display="1">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>

                        <div id="productList">
                            <!-- widget-tools -->
                            
                            <div class="widget-tools">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <form action="" class="form-inline">
                                            <div class="form-group">
                                                <select name="rows" table-name="test" class="form-control input-sm">
                                                    <option value="">Xem</option>
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <div class="tool">
                                            <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle">
                                                    <i class="fa fa-plus"></i> Tạo chứng từ
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Hóa đơn bán hàng</a></li>
                                                    <li><a href="#">Hóa đơn bán sỉ - bán buôn</a></li>
                                                    <li><a href="#">Hóa đơn mua hàng</a></li>
                                                    <li><a href="#">Chuyển kho nội bộ</a></li>
                                                    <li><a href="#">Phiếu hủy hàng hóa</a></li>
                                                    <li><a href="#">Xuất hàng trả lại</a></li>
                                                    <li><a href="#">Nhập hàng trả lại</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="tool">
                                            <a href="javascript:;" class="btn btn-sm">
                                                <i class="fa fa-sign-out"></i> Import
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- widget-content -->
                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-default table-bordered table-hover" name="test">
                                        <thead>
                                            <tr class="active">
                                                <th class="text-center">STT</th>
                                                <th class="text-center" width="200">Số chứng từ</th>
                                                <th width="200">Ngày chứng từ</th>
                                                <th>Người lập</th>
                                                <th>Diễn giải</th>
                                                <th>PS nợ</th>
                                                <th>PS có</th>
                                                <th width="90" class="text-center">Thao tác</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @for ($i = 1; $i <= 15; $i++)
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">SP0123</td>
                                                    <td>
                                                        <a href="{{ route('customers.show', ['id' => $i]) }}" title="Xem chi tiết">
                                                            Samsung Galaxy S3
                                                        </a>
                                                    </td>
                                                    <td>Phạm Kỳ Khôi</td>
                                                    <td>2,000,000</td>
                                                    <td>100</td>
                                                    <td>500</td>
                                                    <td class="text-center">
                                                        <a href="#" title="Xem chi tiết" class="btn-icon label-edit" data-toggle="modal">
                                                            <span class="glyphicon glyphicon-edit"></span>
                                                        </a>

                                                        <a href="#" title="Xóa" class="btn-icon label-delete">
                                                            <span class="glyphicon glyphicon-remove-circle"></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- widget-footer -->
                            <div class="widget-footer">
                                <div class="text-right">
                                    <ul class="pagination">
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection