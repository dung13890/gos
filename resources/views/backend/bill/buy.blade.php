@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style('assets/css/backend/bills/bill.css') }}
@endpush

@section('page-content')
    <div id="content">
        <div class="container-fluid">
            <h3 class="page-title">Hóa đơn mua hàng</h3>
            <div class="row">
                @include('backend.bill._info')
                <div class="col-md-9">
                    <div class="widget">
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Danh sách hàng hóa</h1>
                            <a href="javascript:;" class="toggle-content" references="#nhapkhomua" display="1">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>

                        <div id="nhapkhomua">
                            <!-- widget-tools -->
                            <div class="widget-tools">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <form action="" class="form-inline">
                                            <div class="form-group">
                                                <input type="text" class="form-control input-sm input-suggest" placeholder="Mã hoặc tên hàng hóa" size="60px" />
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
                                    <table class="table table-condensed table-default table-bordered table-hover" name="test">
                                        <thead>
                                            <tr class="active">
                                                <th class="text-center">STT</th>
                                                <th class="text-center">Mã</th>
                                                <th>Tên sản phẩm</th>
                                                <th class="text-center">ĐVT</th>
                                                <th class="text-center" width="150">Đơn giá</th>
                                                <th class="text-center" width="100">Số lượng</th>
                                                <th class="text-center" width="100">Khuyễn mãi</th>
                                                <th class="text-right">Thành tiền</th>
                                                <th class="text-center">HSD</th>
                                                <th width="100px">Thao tác</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @for($i = 1; $i <= 12; $i++)
                                                <tr>
                                                    <td class="text-center">{{ $i }}</td>
                                                    <td class="text-center">SP0123</td>
                                                    <td>Samsung Galaxy S3</td>
                                                    <td class="text-center">Cái</td>
                                                    <td>
                                                        <input type="text" class="form-control input-sm text-right" value="2.000.000" />
                                                    </td>
                                                    <td><input type="number" class="form-control input-sm text-right" value="{{ $i }}" /></td>
                                                    <td><input type="text" class="form-control input-sm text-right" value="5%" /></td>
                                                    <td class="text-right">190,000,000</td>
                                                    <td class="text-center">01/12/2019</td>
                                                    <td class="text-center">
                                                        <a title="Delete" data-toggle="tooltip" data-placement="right" class="btn btn-danger">
                                                            <i class="glyphicon glyphicon-remove"></i> 
                                                        </a>
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
                                            <a href="#" class="btn btn-default">Lưu lại</a>
                                            <a href="#" class="btn btn-default">Lưu xem trước</a>
                                            <a href="#" class="btn btn-default">Hủy bỏ</a>
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
