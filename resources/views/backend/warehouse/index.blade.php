@extends('layouts.backend')

@section('page-content')
    <div id="RoomsController">
        @include('backend.warehouse._form')
        
        <div id="content">
            <div class="container-fluid">
                <h3>Quản lý kho hàng</h3>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="widget">
                            <div class="widget-heading">
                                <h1 class="title text-uppercase">Danh kho hàng</h1>
                                <a href="javascript:;" class="toggle-content" references="#providerList" display="1">
                                    <i class="fa fa-angle-down"></i>
                                </a>
                            </div>
                            
                            <div id="providerList">
                            @include('backend.warehouse._tool')
                                <div class="widget-content">
                                    <div class="table-responsive">
                                        <table class="table table-condensed table-default table-bordered table-hover" id="table-index">
                                            <thead>
                                                <tr class="active">
                                                    <th style="display:none">ID</th>
                                                    <th width="100">Mã nhóm</th>
                                                    <th>Tên kho hàng</th>
                                                    <th>Tên chủ kho</th>
                                                    <th>Thuộc chi nhánh</th>
                                                    <th width="100" class="text-center">Thao tác</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @for($i = 1; $i < 15; $i ++)
                                                    <tr>
                                                        <td>CUPA {{ $i }}</td>
                                                        <td>MANA {{ $i }}</td>
                                                        <td>MANA {{ $i }}</td>
                                                        <td>Hà Nội</td>
                                                        <td class="text-center">
                                                            <a href="" title="Sửa"><i class="glyphicon glyphicon-pencil"></i></a>
                                                            <a href="" title="Xem"><i class="glyphicon glyphicon-eye-open"></i></a>
                                                            <a href="" title="Xóa"><i class="glyphicon glyphicon-remove"></i></a>
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
    </div>
@endsection
