@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style("assets/css/backend/checkbox-radiobox.css") }}
    {{ HTML::style('/assets/css/backend/bills/stockrequisition.css') }}
@endpush

@push('prescripts')

@endpush

@section('page-content')

<div id="PositionsController">
    <div id="content">
        <div class="container-fluid">
            <h3>
                Phiếu yêu cầu mua hàng
                <a href="{{ route('bill.createstockrequisition') }}" role="button" class="btn btn-success pull-right" data-toggle="modal">
                    <i class="fa fa-plus"></i> Tạo phiếu yêu cầu
                </a>
            </h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget">
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Danh sách phiếu yêu cầu</h1>
                        </div>

                        <div class="widget-content">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#notapproved">Chưa phê duyệt</a></li>
                                <li><a data-toggle="tab" href="#approved">Đã phê duyệt</a></li>
                                <li><a data-toggle="tab" href="#all">Tất cả</a></li>

                                <li class="pull-right">
                                    <div class="form-filter">
                                        <label class="pull-left">Từ ngày</label>
                                        <input class="datepicker form-control input-sm pull-left" />
                                        <label class="pull-left">Đến ngày</label>
                                        <input class="datepicker form-control input-sm pull-left" />
                                        <button type="submit" class="btn input-sm btn-primary btn-search">
                                            <span class="glyphicon glyphicon-search"></span> Tìm kiếm
                                        </button>
                                        <button type="reset" class="btn input-sm btn-danger btn-search">
                                            <span class="glyphicon glyphicon glyphicon-ban-circle"></span> Reset
                                        </button>

                                        <button type="reset" class="btn input-sm btn-success btn-search">
                                            <span class="glyphicon glyphicon glyphicon-ok"></span> Phê duyệt
                                        </button>
                                    </div>
                                </li>
                            </ul>

                            <div id="notapproved" class=" tab-pane data-grid-table fade in active">
                                <table class="table table-condensed table-default table-bordered table-hover" id="table-index">
                                    <thead>
                                        <tr class="active">
                                            <th width="60" class="text-center"><input type="checkbox" /></th>
                                            <th>Người yêu cầu</th>
                                            <th>Ngày yêu cầu</th>
                                            <th>Phòng ban</th>
                                            <th>Chứng từ số</th>
                                            <th>Ngày cần hàng</th>
                                            <th>Nhà cung cấp</th>
                                            <th>Kho nhận</th>
                                            <th width="100" class="text-center">Thao tác</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @for($i = 1; $i <= 10; $i ++)
                                            <tr>
                                                <td class="text-center">
                                                    <input type="checkbox" />
                                                </td>
                                                <td>Get up to 50% off on Candle hotders</td>
                                                <td>15/11/2014 00h00</td>
                                                <td>20/11/2014 00h00</td>
                                                <td>
                                                    HD-D73325
                                                </td>
                                                <td>Tất cả</td>
                                                <td>Vip</td>
                                                <td>Kho kinh doanh</td>
                                                <td class="text-center">
                                                    <a href="{{ route('bill.stockrequisitiondetail') }}" title="Xem yêu cầu">Xem</a> | 
                                                    <a href="javascript:void(0)" title="Duyệt yêu cầu">Duyệt</a>
                                                </td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>

                            <div id="approved" class="table-responsive data-grid-table tab-pane fade">
                                <table class="table table-condensed table-default table-bordered table-hover" id="table-index">
                                    <thead>
                                        <tr class="active">
                                            <th width="60" class="text-center"><input type="checkbox" /></th>
                                            <th>Người yêu cầu</th>
                                            <th>Ngày yêu cầu</th>
                                            <th>Phòng ban</th>
                                            <th>Chứng từ số</th>
                                            <th>Ngày cần hàng</th>
                                            <th>Nhà cung cấp</th>
                                            <th>Kho nhận</th>
                                            <th width="100" class="text-center">Duyệt ngày</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @for($i = 1; $i <= 10; $i ++)
                                            <tr>
                                                <td class="text-center">
                                                    <input type="checkbox" />
                                                </td>
                                                <td>Get up to 50% off on Candle hotders</td>
                                                <td>15/11/2014 00h00</td>
                                                <td>20/11/2014 00h00</td>
                                                <td>
                                                    HD-D73325
                                                </td>
                                                <td>Tất cả</td>
                                                <td>Vip</td>
                                                <td>Kho kinh doanh</td>
                                                <td>15/11/2014</td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>

                            <div id="all" class="table-responsive data-grid-table tab-pane fade">
                                <table class="table table-condensed table-default table-bordered table-hover" id="table-index">
                                    <thead>
                                        <tr class="active">
                                            <th width="60" class="text-center"><input type="checkbox" /></th>
                                            <th>Người yêu cầu</th>
                                            <th>Ngày yêu cầu</th>
                                            <th>Phòng ban</th>
                                            <th>Chứng từ số</th>
                                            <th>Ngày cần hàng</th>
                                            <th>Nhà cung cấp</th>
                                            <th>Kho nhận</th>
                                            <th width="100" class="text-center"></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <input type="checkbox" />
                                            </td>
                                            <td>Get up to 50% off on Candle hotders</td>
                                            <td>15/11/2014 00h00</td>
                                            <td>20/11/2014 00h00</td>
                                            <td>
                                                HD-D73325
                                            </td>
                                            <td>Tất cả</td>
                                            <td>Vip</td>
                                            <td>Kho kinh doanh</td>
                                            <td>15/11/2014</td>
                                        </tr>

                                        <tr>
                                            <td class="text-center">
                                                <input type="checkbox" />
                                            </td>
                                            <td>Get up to 50% off on Candle hotders</td>
                                            <td>15/11/2014 00h00</td>
                                            <td>20/11/2014 00h00</td>
                                            <td>
                                                HD-D73325
                                            </td>
                                            <td>Tất cả</td>
                                            <td>Vip</td>
                                            <td>Kho kinh doanh</td>
                                            <td class="text-center">
                                                <a href="javascript:void(0)" title="Xem yêu cầu">Xem</a> | 
                                                <a href="javascript:void(0)" title="Duyệt yêu cầu">Duyệt</a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-center">
                                                <input type="checkbox" />
                                            </td>
                                            <td>Get up to 50% off on Candle hotders</td>
                                            <td>15/11/2014 00h00</td>
                                            <td>20/11/2014 00h00</td>
                                            <td>
                                                HD-D73325
                                            </td>
                                            <td>Tất cả</td>
                                            <td>Vip</td>
                                            <td>Kho kinh doanh</td>
                                            <td>15/11/2014</td>
                                        </tr>

                                        <tr>
                                            <td class="text-center">
                                                <input type="checkbox" />
                                            </td>
                                            <td>Get up to 50% off on Candle hotders</td>
                                            <td>15/11/2014 00h00</td>
                                            <td>20/11/2014 00h00</td>
                                            <td>
                                                HD-D73325
                                            </td>
                                            <td>Tất cả</td>
                                            <td>Vip</td>
                                            <td>Kho kinh doanh</td>
                                            <td class="text-center">
                                                <a href="javascript:void(0)" title="Xem yêu cầu">Xem</a> | 
                                                <a href="javascript:void(0)" title="Duyệt yêu cầu">Duyệt</a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-center">
                                                <input type="checkbox" />
                                            </td>
                                            <td>Get up to 50% off on Candle hotders</td>
                                            <td>15/11/2014 00h00</td>
                                            <td>20/11/2014 00h00</td>
                                            <td>
                                                HD-D73325
                                            </td>
                                            <td>Tất cả</td>
                                            <td>Vip</td>
                                            <td>Kho kinh doanh</td>
                                            <td>15/11/2014</td>
                                        </tr>

                                        <tr>
                                            <td class="text-center">
                                                <input type="checkbox" />
                                            </td>
                                            <td>Get up to 50% off on Candle hotders</td>
                                            <td>15/11/2014 00h00</td>
                                            <td>20/11/2014 00h00</td>
                                            <td>
                                                HD-D73325
                                            </td>
                                            <td>Tất cả</td>
                                            <td>Vip</td>
                                            <td>Kho kinh doanh</td>
                                            <td class="text-center">
                                                <a href="javascript:void(0)" title="Xem yêu cầu">Xem</a> | 
                                                <a href="javascript:void(0)" title="Duyệt yêu cầu">Duyệt</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
