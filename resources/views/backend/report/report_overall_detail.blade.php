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
                                <li><a href="{{ url('reports/overall') }}" class="active">
                                    <span class='glyphicon glyphicon-th'></span>Tồn tổng thế</a>
                                </li>
                                <li><a href="{{ url('reports/importexport') }}">
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
                            <h1 class="title text-uppercase">Báo cáo tồn tổng thể hàng hóa Samsung Galaxy S1</h1>
                            <a href="javascript:;" class="toggle-content" references="#providerList" display="1">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>
                        
                        <div>
                            <div class="widget-content">
                                <div class="table-responsive">
                                    
                                    <table class="table table-condensed table-default table-bordered table-hover" name="test">
                                        <thead>
                                            <tr class="merged-col">
                                                <th class="text-center">STT</th>
                                                <th class="text-center">Mã hàng</th>
                                                <th>Tên hàng hóa</th>
                                                <th class="text-center">ĐVT</th>
                                                <th class="text-center" width="80">Giá nhập</th>

                                                <th class="text-center">Giá buôn</th>
                                                <th class="text-center">Giá lẻ</th>
                                                <th class="text-center">Tổng tồn</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td class="text-center">SP0123</td>
                                                <td>Samsung Galaxy S1</td>
                                                <td class="text-center">Cái</td>
                                                <td class="text-center">
                                                    
                                                </td>
                                                <td class="text-center">43</td>
                                                <td class="text-center">2</td>
                                                <td class="text-center in-qty">5</td>
                                            </tr>
                                            <tr class="in-qty">
                                                <td class="text-left" colspan="2"><b>Tên kho</b></td>
                                                <td class="text-left" colspan="7"><b>Số lượng tồn</b></td>
                                            </tr>
                                            @for ($i = 1; $i <= 15; $i++)
                                            <tr>
                                                <td class="text-left" colspan="2">Kho hàng số {{ $i }}</td>
                                                <td class="text-left" colspan="7">{{ $i }}</td>
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
