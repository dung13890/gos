@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style("assets/css/backend/reports/report.css") }}
@endpush

@section('page-content')
<div id="PositionsController">    
    <div id="content">
        <div class="container-fluid">
            <h3>Báo cáo tổng hợp</h3>
            <div class="row">
                <div class="col-xs-2">
                    <div class="widget">
                        <nav class="sidebar-report">
                            <ul>
                                <li><a href="#section2" class="active" title="Tổng quan">
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
                                <li><a href="#section3">
                                    <span class='glyphicon glyphicon-th'></span>Xuất nhập tồn kho</a>
                                </li>
                                <li><a href="#section3">
                                    <span class='glyphicon glyphicon-th'></span>Doanh thu</a>
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
                            <h1 class="title text-uppercase">Tổng quan</h1>
                            <a href="javascript:;" class="toggle-content" references="#providerList" display="1">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>
                        
                        <div id="providerList">
                            <div class="widget-content">
                                <div class="table-responsive">
                                    <div class="object-report">
                                        <div class="header-object-report">
                                            <h3 class="pull-left">Khách hàng</h3>
                                            <div class="pull-right">
                                                <input type="date" name="">
                                                <input type="date" name="">
                                                <button class="btn btn-success btn-view-report">Xem</button>
                                                <button class="btn btn-danger btn-view-report">Clear</button>
                                            </div>
                                        </div>
                                        
                                        <div class="clearfix"></div>
                                        <div class="col-xs-2 result-report">
                                            <small>Tổng số khách hàng</small>
                                            <label>1000000</label>
                                        </div>
                                        <div class="col-xs-2 result-report">
                                            <small>Khách hàng mới lần đầu</small>
                                            <label>1000000</label>
                                        </div>
                                        <div class="col-xs-2 result-report">
                                            <small>Khách hàng cũ quay lại </small>
                                            <label>1000000</label>
                                        </div>
                                        <div class="col-xs-2 result-report">
                                            <small>Khách hàng của chi nhánh</small>
                                            <label>1000000</label>
                                        </div>
                                        <div class="col-xs-2 result-report">
                                            <small>Khách hàng của Gara</small>
                                            <label>1000000</label>
                                        </div>
                                        <div class="col-xs-2 result-report">
                                            <small>Khách hàng là Gara</small>
                                            <label>1000000</label>
                                        </div>
                                    </div>
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
