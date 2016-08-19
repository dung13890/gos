@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style('assets/css/backend/providers/provider.css') }}
@endpush

@push('prescripts')
    {{ HTML::script("assets/vue/room.js") }}
@endpush    
@section('page-content')
    
    @include('backend.room._form')

    <!-- #content -->
    <div id="content">
        <div class="container-fluid">
            <h3>Quản lý phòng ban</h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget">
                        <!-- widget-heading -->
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Danh sách phòng ban</h1>
                            <a href="javascript:;" class="toggle-content" references="#providerList" display="1">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>
                        
                        <div id="providerList">
                            <!-- widget-tools -->
                            <div class="widget-tools">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <form action="" class="form-inline">
                                            <div class="form-group">
                                                <select name="table-index_length" aria-controls="table-index" class="form-control input-sm">
                                                    <option value="---">Xem</option>
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                </select>

                                                <div class="btn-group">
                                                    <input type="text" class="form-control input-sm searchinput" placeholder="Tìm theo mã hoặc tên phòng ban" size="50px" />
                                                    <span class="glyphicon glyphicon-remove-circle searchclear"></span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <div class="tool">
                                            <a href="#newProvider" role="button" class="btn btn-sm" data-toggle="modal">
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
                                        <div class="tool">
                                            <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle">
                                                    <span class="fa fa-bars"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Item selected</a></li>
                                                    <li><a href="#">Item selected</a></li>
                                                    <li><a href="#">Item selected</a></li>
                                                    <li><a href="#">Item selected</a></li>
                                                    <li><a href="#">Item selected</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- widget-content -->
                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-default table-bordered table-hover" name="test">
                                        <thead>
                                            <tr class="active">
                                                <th class="text-center">STT</th>
                                                <th class="text-center">Mã</th>
                                                <th>Tên phòng</th>
                                                <th>Trưởng phòng</th>
                                                <th>Số nhân viên</th>
                                                <th>Ngày thành lập</th>
                                                <th>Thuộc chi nhánh</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @for($i = 1; $i <= 15; $i ++)
                                                <tr>
                                                    <td class="text-center">$i</td>
                                                    <td class="text-center">Mã</td>
                                                    <td>Phòng số {{ $i }}</td>
                                                    <td>Nguyễn Văn A {{ $i }}</td>
                                                    <td>6</td>
                                                    <td>01/12/2019</td>
                                                    <td>Hà Nội</td>
                                                    <td>
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