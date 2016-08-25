@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style('vendor/datatables-bs/css/dataTables.bootstrap.min.css') }}
    {{ HTML::style("vendor/datepicker/css/bootstrap-datepicker.min.css") }}
    {{ HTML::style('vendor/jasny-bootstrap/css/jasny-bootstrap.min.css') }}
@endpush

@push('prescripts')
    {{ HTML::script("vendor/datatables/js/jquery.dataTables.min.js") }}
    {{ HTML::script("vendor/datatables-bs/js/dataTables.bootstrap.min.js") }}
    {{ HTML::script('vendor/datepicker/js/bootstrap-datepicker.min.js') }}
    {{ HTML::script('vendor/jasny-bootstrap/js/jasny-bootstrap.min.js') }}
    {{ HTML::script("assets/vue/room.js") }}
@endpush

@section('page-content')
    <div id="RoomsController">
        @include('backend.groupproduct._form')
        
        <div id="content">
            <div class="container-fluid">
                <h3>Quản lý nhóm hàng hóa</h3>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="widget">
                            <div class="widget-heading">
                                <h1 class="title text-uppercase">Danh nhóm hàng hóa</h1>
                                <a href="javascript:;" class="toggle-content" references="#providerList" display="1">
                                    <i class="fa fa-angle-down"></i>
                                </a>
                            </div>
                            
                            <div id="providerList">
                            @include('backend.groupproduct._tool')
                                <div class="widget-content">
                                    <div class="table-responsive">
                                        <table class="table table-condensed table-default table-bordered table-hover" id="table-index">
                                            <thead>
                                                <tr class="active">
                                                    <th style="display:none">ID</th>
                                                    <th width="100">Mã</th>
                                                    <th>Tên nhóm hàng hóa</th>
                                                    <th width="200" class="text-center">Giới hạn tồn tối thiểu</th>
                                                    <th width="80" class="text-center">Thao tác</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @for($i = 1; $i < 15; $i ++)
                                                    <tr>
                                                        <td>CUPA {{ $i }}</td>
                                                        <td>MANA {{ $i }}</td>
                                                        <td class="text-center">{{ $i }}</td>
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
