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
                                <div class="widget-tools">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <form action="" class="form-inline">
                                                <div class="form-group">
                                                    <div class="btn-group">
                                                        <input type="text" class="form-control input-sm searchinput" placeholder="Tìm theo mã hoặc tên" size="50px" />
                                                        <span class="glyphicon glyphicon-remove-circle searchclear"></span>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <div class="tool">
                                                <a href="#newProvider" v-on:click="create" role="button" class="btn btn-sm" data-toggle="modal">
                                                    <i class="fa fa-plus"></i> Thêm mới
                                                </a>
                                            </div>
                                            <div class="tool">
                                                <a href="javascript:;" class="btn btn-sm">
                                                    <i class="fa fa-sign-out"></i> Import
                                                </a>
                                            </div>
                                            <div class="tool">
                                                <div class="btn-group">
                                                    <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle">
                                                        <span class="fa fa-sign-out"></span>
                                                        Export
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">Excel</a></li>
                                                        <li><a href="#">PDF</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="widget-content">
                                    <div class="table-responsive">
                                        <table class="table table-condensed table-default table-bordered table-hover" id="table-index">
                                            <thead>
                                                <tr class="active">
                                                    <th style="display:none">ID</th>
                                                    <th width="100">Mã</th>
                                                    <th>Tên nhóm hàng hóa</th>
                                                    <th width="200" class="text-center">Giới hạn tồn tối thiểu</th>
                                                    <th width="100" class="text-center">Thao tác</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @for($i = 1; $i < 15; $i ++)
                                                    <tr>
                                                        <td>CUPA {{ $i }}</td>
                                                        <td>MANA {{ $i }}</td>
                                                        <td class="text-center">{{ $i }}</td>
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
