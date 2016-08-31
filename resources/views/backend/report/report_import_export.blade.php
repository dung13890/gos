@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style("assets/css/backend/reports/report.css") }}
@endpush

@push('prescripts')
    {{ HTML::script("assets/js/backend/reports/report.js") }}
@endpush

@section('page-content')
<div id="PositionsController">

    @include('backend.report._bill')

    <div id="content">
        <div class="container-fluid">
            <h3>Báo cáo - Thống kê</h3>
            <div class="row">
                <div class="col-xs-2">
                    <div class="widget">
                        <nav class="sidebar-report">
                            <ul>
                                <li><a href="{{ route('reports.index') }}" title="Tổng quan">
                                    <span class='glyphicon glyphicon-th'></span>Tổng quan</a>
                                </li>
                                <li><a href="#section2">
                                    <span class='glyphicon glyphicon-th'></span>Chi nhánh</a>
                                </li>
                                <li><a href="#section2">
                                    <span class='glyphicon glyphicon-th'></span>Gara</a>
                                </li>
                                <li><a href="#section1">
                                    <span class='glyphicon glyphicon-th'></span>Khách hàng</a>
                                </li>
                                <li><a href="{{ url('reports/importexport') }}" class="active">
                                    <span class='glyphicon glyphicon-th'></span>Xuất nhập tồn kho</a>
                                </li>
                                <li><a href="#section3">
                                    <span class='glyphicon glyphicon-th'></span>Doanh thu</a>
                                </li>
                                <li><a href="#section3">
                                    <span class='glyphicon glyphicon-th'></span>Công nợ</a>
                                </li>
                                <li><a href="#section3">
                                    <span class='glyphicon glyphicon-th'></span>Sửa chữa bảo hành</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xs-10">
                    <div class="widget">
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Báo cáo xuất nhập tồn</h1>
                            <a href="javascript:;" class="toggle-content" references="#providerList" display="1">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>
                        
                        <div>
                            <div class="widget-content">
                                <div class="table-responsive">
                                    <div class="object-report">
                                        <div class="header-object-report">
                                            <h3 class="pull-left">Tùy chọn</h3>
                                            <div class="pull-right">
                                                <select>
                                                    <option>Chi nhánh</option>
                                                </select>
                                                
                                                <select>
                                                    <option>Kho</option>
                                                </select>

                                                <select>
                                                    <option>Gara</option>
                                                </select>

                                                <input type="date" name="">
                                                <input type="date" name="">
                                                <button class="btn btn-success btn-view-report">Xem</button>
                                                <button class="btn btn-danger btn-view-report">Clear</button>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <table class="table table-condensed table-default table-bordered table-hover" name="test">
                                        <thead>
                                            <tr class="active">
                                                <th class="text-center" colspan="5">Thông tin chung</th>
                                                <th class="text-center">Tồn</th>
                                                <th class="text-center" colspan="4">Nhập trong kỳ</th>
                                                <th class="text-center" colspan="4">Xuất trong kỳ</th>
                                                <th class="text-center">Tồn</th>
                                            </tr>
                                            <tr class="merged-col">
                                                <th class="text-center">STT</th>
                                                <th class="text-center">Mã hàng</th>
                                                <th>Tên sản phẩm</th>
                                                <th class="text-center">ĐVT</th>
                                                <th class="text-center" width="80">Chứng từ</th>

                                                <th class="text-center">Đầu kỳ</th>
                                                <th class="text-center">Mua</th>
                                                <th class="text-center">Trả</th>
                                                <th class="text-center">Khác</th>
                                                <th class="text-center">Tổng</th>

                                                <th class="text-center">Đầu kỳ</th>
                                                <th class="text-center">Mua</th>
                                                <th class="text-center">Trả</th>
                                                <th class="text-center">Khác</th>
                                                <th class="text-center">Cuối kỳ</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @for ($i = 1; $i <= 15; $i++)
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">SP0123</td>
                                                    <td>Samsung Galaxy S3</td>
                                                    <td class="text-center">Cái</td>
                                                    <td class="text-center">
                                                        <a href='#list-bill' title="Xem chứng từ" data-toggle="modal">Xem</a>
                                                    </td>
                                                    <td class="text-center begin-qty">43</td>
                                                    <td class="text-center in-qty">2</td>
                                                    <td class="text-center in-qty">100</td>
                                                    <td class="text-center in-qty">5</td>
                                                    <td class="text-center in-qty">19</td>
                                                    <td class="text-center out-qty">1</td>
                                                    <td class="text-center out-qty">3</td>
                                                    <td class="text-center out-qty">3</td>
                                                    <td class="text-center out-qty">3</td>
                                                    <td class="text-center begin-qty">200</td>
                                                </tr>
                                            @endfor
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
</div>
@endsection
