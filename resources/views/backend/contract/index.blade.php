@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style("assets/css/backend/contracts/contract.css") }}
@endpush

@section('page-content')
<div id="PositionsController">
    <div id="content">
        <div class="container-fluid">
            <h3>
                Quản lý hợp đồng
                <a href="{{ route('contracts.create') }}" role="button" class="btn btn-success pull-right" data-toggle="modal">
                    <i class="fa fa-plus"></i> Tạo hợp đồng mới
                </a>

                <a href="#newProvider" role="button" class="btn btn-primary pull-right" data-toggle="modal">
                    <i class="fa fa-plus"></i> Tạo mẫu hợp đồng
                </a>
            </h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget">
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Danh sách</h1>
                        </div>
                        
                        <div id="providerList">
                        
                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-default table-bordered table-hover" id="table-index">
                                        <thead>
                                            <tr class="active">
                                                <th width="50" class="text-center">STT</th>
                                                <th>Số HĐ</th>
                                                <th width="150">Ngày ký HĐ</th>
                                                <th width="180">Loại hợp đồng</th>
                                                <th width="200">NCC</th>
                                                <th>Trạng thái</th>
                                                <th width="80" class="text-center">Thao tác</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr style="    background: #e3eff1;">
                                                <td><input type="" name="" class="event-code" /></td>
                                                <td><input type="" name="" class="form-control input-sm" /></td>
                                                <td>
                                                    <span class="fromto">From </span>
                                                    <input type="text" name="" class="datepicker input-sm start-date" />
                                                    <span class="fromto">To</span>
                                                    <input type="text" name="" class="datepicker input-sm start-date" />
                                                </td>
                                                <td>
                                                    <select class="form-control input-sm">
                                                        <option>Cho chọn nhiều chi nhánh</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control input-sm">
                                                        <option>Chọn</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control input-sm">
                                                        <option>Chọn</option>
                                                    </select>
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-info btn-filter btn-filter-search">
                                                        <span class="glyphicon glyphicon-search"></span> Tìm kiếm
                                                    </button>

                                                    <button type="button" class="btn btn-danger btn-filter">
                                                        <span class="glyphicon glyphicon glyphicon-ban-circle"></span> Reset
                                                    </button>
                                                </td>
                                            </tr>

                                            @for($i = 1; $i <= 3; $i ++)
                                            <tr>
                                                <td>ABCXYZ</td>
                                                <td>Get up to 50% off on Candle hotders</td>
                                                <td>15/11/2014 00h00</td>
                                                <td>20/11/2014 00h00</td>
                                                <td>Resto</td>
                                                <td>Có hiệu lực</td>
                                                <td class="text-center">
                                                    <a href="#newRoom"
                                                        title="Sửa"
                                                        class="btn-icon label-edit"
                                                        data-toggle="modal"
                                                        v-on="click: getUserProfile()">
                                                        <span class="glyphicon glyphicon-edit"></span>
                                                    </a>

                                                    <a href="javascript:void(0);" title="Xóa" 
                                                        class="btn-icon label-delete"
                                                        v-on:click="destroy(room.id, room)">
                                                        <span class="glyphicon glyphicon-remove-circle"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
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
