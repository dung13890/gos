@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style('assets/css/backend/providers/provider.css') }}
@endpush

@section('page-content')
    @include('backend.provider._form')
    <!-- #content -->
    <div id="content">
        <div class="container-fluid">
            <h3>Quản lý nhà cung cấp</h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget">
                        <!-- widget-heading -->
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Danh sách nhà cung cấp</h1>
                            <a href="javascript:;" class="toggle-content" references="#providerList" display="1">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>

                        <div id="providerList">
                            <!-- widget-tools -->
                            @include('backend.provider._tool')
                            <!-- widget-content -->
                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-default table-bordered table-hover" name="test">
                                        <thead>
                                            <tr class="active">
                                                <th class="text-center">STT</th>
                                                <th class="text-center">Ảnh đại diện</th>
                                                <th class="text-center">Mã</th>
                                                <th>Tên nhà cung cấp</th>
                                                <th>Người liên hệ</th>
                                                <th>Điện thoại</th>
                                                <th>Địa chỉ</th>
                                                <th>Địa chỉ email</th>
                                                <th>Tên công ty</th>
                                                <th>Mã số thuế</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @for($i = 1; $i <= 12; $i ++)
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">Ảnh</td>
                                                    <td class="text-center">SP0123</td>
                                                    <td>Samsung Galaxy S3</td>
                                                    <td class="text-center">Cái</td>
                                                    <td>2,000,000</td>
                                                    <td>100</td>
                                                    <td>5%</td>
                                                    <td>190,000,000</td>
                                                    <td class="text-center">01/12/2019</td>
                                                    <td class="text-center">
                                                        <a href="#newProvider" role="button" class="btn btn-sm" data-toggle="modal">
                                                            Sửa
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>

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