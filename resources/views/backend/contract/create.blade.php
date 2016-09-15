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
            <h3 class="page-title">Tạo hợp đồng mới
            <a href="{{ route('contracts.index') }}"
                role="button" class="btn btn-danger pull-right"
                data-toggle="modal">
                    <i class="glyphicon glyphicon-arrow-left"></i> Back
                </a>
            </h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="widget">
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
