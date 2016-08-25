@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style('/assets/css/backend/products/product.css') }}
@endpush

@section('page-content')
    @include('backend.product._form')
    <div id="content">
        <div class="container-fluid">
            <h3>Quản hàng hóa vật tư</h3>
            <div class="row">
            @include('backend.product._filter')
                <div class="col-md-9">
                    <div class="widget">
                        <!-- widget-heading -->
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Danh sách hàng hóa</h1>
                            <a href="javascript:;" class="toggle-content" references="#productList" display="1">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>

                        <div id="productList">
                            <!-- widget-tools -->
                            @include('backend.product._tool')
                            <!-- widget-content -->
                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-default table-bordered table-hover" name="test">
                                        <thead>
                                            <tr class="active">
                                                <th class="text-center">STT</th>
                                                <th class="text-center">Mã</th>
                                                <th>Tên sản phẩm</th>
                                                <th class="text-center">ĐVT</th>
                                                <th>Đơn giá</th>
                                                <th>Số lượng</th>
                                                <th>Khuyễn mãi</th>
                                                <th>Thành tiền</th>
                                                <th class="text-center">HSD</th>
                                                <th width="80">Thao tác</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @for ($i = 1; $i <= 15; $i++)
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">SP0123</td>
                                                    <td>Samsung Galaxy S3</td>
                                                    <td class="text-center">Cái</td>
                                                    <td>2,000,000</td>
                                                    <td>100</td>
                                                    <td>5%</td>
                                                    <td>190,000,000</td>
                                                    <td class="text-center">01/12/2019</td>
                                                    <td class="text-center">
                                                        <a href="#newProduct" title="Sửa thông tin" class="btn-icon label-edit" data-toggle="modal">
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