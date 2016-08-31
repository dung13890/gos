@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style("assets/css/backend/reports/report.css") }}
@endpush

@push('prescripts')
    {{ HTML::script("assets/js/backend/reports/report.js") }}
    <script type="text/javascript">

        google.charts.load('current', {'packages':['corechart']});

        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                ['Khách mới', 3],
                ['Khách cũ', 1],
            ]);

            // Set chart options
            var options = {
                'title':'',
                'width':500,
                'height':250
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                ['Gara', 3],
                ['Chi nhánh', 1],
                ['Shop', 5],
            ]);
            var chart = new google.visualization.PieChart(document.getElementById('gara_branch'));
            chart.draw(data, options);
        }
    </script>
@endpush

@section('page-content')
<div id="PositionsController">    
    <div id="content">
        <div class="container-fluid">
            <h3>Báo cáo - Thống kê</h3>
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
                            <h1 class="title text-uppercase">Khách hàng</h1>
                            <a href="javascript:;" class="toggle-content" references="#providerList" display="1">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>
                        
                        <div id="providerList">
                            <div class="widget-content">
                                <div class="table-responsive">
                                    <div class="object-report">
                                        <div class="header-object-report">
                                            <h3 class="pull-left">Tùy chọn</h3>
                                            <div class="pull-right">

                                                <select>
                                                    <option>Kinh doanh</option>
                                                </select>

                                                <select>
                                                    <option>Chi nhánh</option>
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
                                        
                                        <div id="col-xs-6">
                                            <div id="chart_div"></div>
                                        </div>

                                        <div id="col-xs-6">
                                            <div id="gara_branch"></div>
                                        </div>

                                        <div class="clearfix"></div>

                                        <div class="col-xs-2 result-report">
                                            <small>Tổng số</small>
                                            <label>1.000.000</label>
                                        </div>

                                        <div class="col-xs-2 result-report">
                                            <small>Khách hàng mới</small>
                                            <label>600.000</label>
                                        </div>

                                        <div class="col-xs-2 result-report">
                                            <small>Khách hàng cũ</small>
                                            <label>400.000</label>
                                        </div>
                                        
                                        <div class="col-xs-2 result-report">
                                            <small>Chi nhánh</small>
                                            <label>500.000</label>
                                        </div>
                                        
                                        <div class="col-xs-2 result-report">
                                            <small>Gara</small>
                                            <label>200.000</label>
                                        </div>

                                        <div class="col-xs-2 result-report">
                                            <small>Shop</small>
                                            <label>300.000</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget">
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Doanh thu</h1>
                            <a href="javascript:;" class="toggle-content" references="#providerList" display="1">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>
                        
                        <div id="providerList">
                            <div class="widget-content">
                                <div class="table-responsive">
                                    <div class="object-report">
                                        <div class="header-object-report">
                                            <h3 class="pull-left">Tùy chọn</h3>
                                            <div class="pull-right">

                                                <select>
                                                    <option>Kinh doanh</option>
                                                </select>

                                                <select>
                                                    <option>Chi nhánh</option>
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
                                        
                                        <div id="col-xs-6">
                                            <div id="chart_div"></div>
                                        </div>

                                        <div id="col-xs-6">
                                            <div id="gara_branch"></div>
                                        </div>

                                        <div class="clearfix"></div>

                                        <div class="col-xs-2 result-report">
                                            <small>Tổng số</small>
                                            <label>1.000.000</label>
                                        </div>

                                        <div class="col-xs-2 result-report">
                                            <small>Khách hàng mới</small>
                                            <label>600.000</label>
                                        </div>

                                        <div class="col-xs-2 result-report">
                                            <small>Khách hàng cũ</small>
                                            <label>400.000</label>
                                        </div>
                                        
                                        <div class="col-xs-2 result-report">
                                            <small>Chi nhánh</small>
                                            <label>500.000</label>
                                        </div>
                                        
                                        <div class="col-xs-2 result-report">
                                            <small>Gara</small>
                                            <label>200.000</label>
                                        </div>

                                        <div class="col-xs-2 result-report">
                                            <small>Shop</small>
                                            <label>300.000</label>
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
