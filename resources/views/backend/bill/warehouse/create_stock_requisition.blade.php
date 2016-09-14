@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style("assets/css/backend/checkbox-radiobox.css") }}
    {{ HTML::style('/assets/css/backend/bills/create_stock_requisition.css') }}
@endpush

@push('prescripts')
@endpush

@section('page-content')
<div id="content">
        <div class="container-fluid">
            <h3 class="page-title">Tạo yêu cầu mua hàng
            <a href="{{ route('bill.stockrequisition') }}"
                role="button" class="btn btn-danger pull-right"
                data-toggle="modal">
                    <i class="glyphicon glyphicon-arrow-left"></i> Back
                </a>
            </h3>
            <div class="row">
                <div class="col-md-3">
                    <div id="sidebar">
                        <div class="sb-heading">
                            <h3 class="title text-uppercase">Thông tin yêu cầu</h3>
                            <a href="javascript:;" class="toggle-content" references="#sidebar .sb-content" display="1">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>

                        <div class="sb-content">
                            <small>Ngày yêu cầu</small>
                            <input type="" class="datepicker form-control input-sm txt-info-bill" />

                            <small>Số chứng từ (Nếu có)</small>
                            <input type="" class="form-control inline input-sm txt-info-bill" />

                            <small>Số hợp đồng(nếu có)</small>
                            <input type="" class="form-control inline input-sm txt-info-bill" />

                            <small>Người phê duyệt</small>
                            <select class="form-control inline input-sm txt-info-bill">
                                <option value="1">Chọn</option>
                                <option value="1">Chọn</option>
                                <option value="1">Chọn</option>
                                <option value="1">Chọn</option>
                            </select>

                            <small>Bộ phận phê duyệt</small>
                            <select class="form-control inline input-sm txt-info-bill">
                                <option value="1">Chọn</option>
                                <option value="1">Chọn</option>
                                <option value="1">Chọn</option>
                                <option value="1">Chọn</option>
                            </select>

                            <small>Nhà cung cấp</small>
                            <input type="" class="form-control inline input-sm txt-info-bill" />
                            
                            <small>Ngày mong muốn có hàng</small>
                            <input type="" class="datepicker form-control inline input-sm txt-info-bill" />

                            <small>Ghi chú</small>
                            <textarea class="form-control inline input-sm txt-info-bill"></textarea>

                            <div class="form-group">
                                <ul class="payment">
                                    <li>
                                        <strong>Tổng tiền hàng: </strong>
                                        <span>5,000,000</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sb-footer"></div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="widget">
                        <div class="widget-tools">
                            <div class="row">
                                <div class="col-xs-6">
                                    <form action="" class="form-inline">
                                        <div class="form-group">
                                            <input type="text" class="form-control input-sm input-suggest" placeholder="Mã hoặc tên hàng hóa" size="50px" />
                                            <a title="Thêm mới hàng hóa" class="btn btn-success">
                                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            </a>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-xs-6">
                                    <div class="text-right number-product">
                                       <span>
                                            <strong>Mặt hàng: </strong>
                                            <span>2</span>
                                        </span>

                                        <span>|</span>
                                        
                                        <span>
                                            <strong>Số lượng: </strong>
                                            <span>11</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="widget-content">
                            <div class="table-responsive">
                                <table class="table table-condensed table-default table-bordered table-hover" id="table-index">
                                    <thead>
                                        <tr class="active">
                                            <th width="50" class="text-center">STT</th>
                                            <th>Tên hàng</th>
                                            <th>Mã hàng</th>
                                            <th>Đơn vị tính</th>
                                            <th>Nhà cung cấp</th>
                                            <th>Kho nhận</th>
                                            <th class="text-right">Số lượng</th>
                                            <th>Đơn giá</th>
                                            <th>Giá yêu cầu</th>
                                            <th>Thành tiền</th>
                                            <th width="50" class="text-center"></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @for($i = 1; $i <= 10; $i ++)
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td>
                                                    Máy in Laser HP Laserjet Pro 400 M401DN
                                                </td>
                                                <td>HH-009344</td>
                                                <td>Cái</td>
                                                <td>
                                                    HD-D73325
                                                </td>
                                                <td>Tất cả</td>
                                                <td class="text-right">01</td>
                                                <td>Vip</td>
                                                <td>Vip</td>
                                                <td>Kho kinh doanh</td>
                                                <td class="text-center">
                                                    <a href="#" title="Xóa" class="btn-icon label-delete btn-xs">
                                                    <span class="glyphicon glyphicon-remove-circle item-delete"></span></a>
                                                </td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="widget-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-right">
                                        <button class="btn btn-success" type="submit">
                                            <i class="glyphicon glyphicon-floppy-disk"></i> Lưu lại
                                        </button>

                                        <button class="btn btn-info" type="submit">
                                            <i class="glyphicon glyphicon-floppy-disk"></i> Lưu và gửi duyệt
                                        </button>

                                        <button class="btn btn-primary" type="submit">
                                            <i class="glyphicon glyphicon-search"></i> Xem bản in
                                        </button>

                                        <button class="btn btn-primary" type="submit">
                                            <i class="glyphicon glyphicon-print"></i> In
                                        </button>

                                        <button class="btn btn-warning" type="reset">
                                            <i class="glyphicon glyphicon-ban-circle"></i> Hủy
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
