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
                Thông tin chi tiết phiếu yêu cầu
                <a href="#"
                    role="button" 
                    class="btn btn-warning pull-right"
                    data-toggle="modal">
                    <i class="glyphicon glyphicon-edit"></i> Sửa phiếu yêu cầu
                </a>

                <a href="#"
                    role="button" 
                    class="btn btn-success pull-right"
                    data-toggle="modal">
                    <i class="glyphicon glyphicon-ok"></i> Duyệt
                </a>
            </h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget">
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Thông tin</h1>
                        </div>

                        <div class="widget-content">
                            <br/>
                            <div class="col-xs-6">
                                <p>CÔNG TY CPTB TÂN PHÁT</p>
                                <p>Số 168 Phan Trọng Tuệ -Thanh Trì - Hà Nội</p>
                            </div>
                            <div class="col-xs-6 text-center">
                                <p>CỘNG HOÀ XÃ HỘI CHỦ NGHĨA VIỆT NAM</p>
                                <p>Độc lập -  Tự do -  Hạnh Phúc</p>
                            </div>

                            <h4 class="text-center col-xs-12">
                                <div>ĐỀ NGHỊ ĐẶT HÀNG </div>
                                <small>(Số:)</small>
                            </h4>

                            <div id="notapproved" class=" tab-pane data-grid-table fade in active">
                                <table class="table table-condensed table-default table-bordered table-hover" id="table-index">
                                    <thead>
                                        <tr class="active">
                                            <th width="60" class="text-center">STT</th>
                                            <th>Tên mặt hàng</th>
                                            <th>Model</th>
                                            <th>Số lượng</th>
                                            <th>ĐVT</th>
                                            <th>HĐ nội</th>
                                            <th>Khách hàng</th>
                                            <th>Giá bán</th>
                                            <th>Kho nhận</th>
                                            <th>Ngày cần</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @for($i = 1; $i <= 10; $i ++)
                                            <tr>
                                                <td class="text-center">{{ $i }}</td>
                                                <td></td>
                                                <td>15/11/2014 00h00</td>
                                                <td>20/11/2014 00h00</td>
                                                <td>HD-D73325</td>
                                                <td>HD-D73325</td>
                                                <td>Tất cả</td>
                                                <td>1000.000</td>
                                                <td>Kho kinh doanh</td>
                                                <td>20/11/2014 00h00</td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>

                            <div class="widget-footer">
                                <div class="text-right">
                                    <p>Hà nội,  ngày……..tháng……. năm ……</p>
                                </div>
                                <br/>

                                <div class="row">
                                    <div class="col-xs-3 text-left">
                                        <p>NGƯỜI ĐỀ NGHỊ</p>
                                    </div>
                                    
                                    <div class="col-xs-3 text-left">
                                        <p>TRƯỞNG BỘ PHẬN</p>
                                    </div>
                                    
                                    <div class="col-xs-3 text-left">
                                        <p>BAN GIÁM  ĐỐC</p>
                                    </div>

                                    <div class="col-xs-3 text-left">
                                        <p>XÁC NHẬN CỦA XNK</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <h5><strong>LƯU Ý: </strong></h5>
                                            <li> Số lượng hàng cần dặt = “Số lượng hàng cần theo hợp đồng” – “hàng tồn kho”</li>
                                            <li> Sắp xếp danh mục đặt hàng theo hãng. </li>
                                            <li> Tất cả các thông tin cần được điển đầy đủ.</li>

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
