@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style("assets/css/backend/checkbox-radiobox.css") }}
    {{ HTML::style("assets/css/backend/promtions/promotion.css") }}
@endpush

@section('page-content')
<div id="PositionsController">
    
    @include('backend.promotion._form')

    <div id="content">
        <div class="container-fluid">
            <h3>
                Quản lý các chương trình khuyễn mãi tích điểm
                <a href="#newProduct" role="button" class="btn btn-success pull-right" data-toggle="modal">
                    <i class="fa fa-plus"></i> Tạo chương trình mới
                </a>
            </h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget">
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Danh sách</h1>
                            <a href="javascript:;" class="toggle-content" references="#providerList" display="1">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>
                        
                        <div id="providerList">
                        
                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-default table-bordered table-hover" id="table-index">
                                        <thead>
                                            <tr class="active">
                                                <th width="80" class="text-center">Mã</th>
                                                <th>Tên chương trình</th>
                                                <th width="180">Ngày bắt đầu</th>
                                                <th width="180">Ngày kết thúc</th>
                                                <th width="100" class="text-center">Trạng thái</th>
                                                <th>Sản phẩm</th>
                                                <th>Nhóm khách hàng</th>
                                                <th width="80" class="text-center">Thao tác</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr style="    background: #e3eff1;">
                                                <td><input type="" name="" class="event-code" /></td>
                                                <td><input type="" name="" class="form-control input-sm" /></td>
                                                <td>
                                                    <span class="fromto">From </span>
                                                    <input type="text" name="" class="start-date" />
                                                    <span class="fromto">To</span>
                                                    <input type="text" name="" class="start-date" />
                                                </td>
                                                <td>
                                                    <span class="fromto">From </span>
                                                    <input type="text" name="" class="start-date" />
                                                    <span class="fromto">To</span>
                                                    <input type="text" name="" class="start-date" />
                                                </td>
                                                <td>
                                                    <select class="form-control input-sm">
                                                        <option></option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control input-sm">
                                                        <option></option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control input-sm">
                                                        <option></option>
                                                    </select>
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-info btn-filter">
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
                                                <td>
                                                    <span class="label label-success">Hoàn thành</span>
                                                </td>
                                                <td>Tất cả</td>
                                                <td>Vip</td>
                                                <td class="text-center">
                                                    <a href="#newProduct" title="Sửa" class="btn-icon label-edit" data-toggle="modal">
                                                        <span class="glyphicon glyphicon-edit"></span>
                                                    </a>

                                                    <a href="javascript:void(0)" 
                                                        title="Xóa"
                                                        class="btn-icon label-delete btn-xs handle-delete"
                                                        v-on:click="destroy(position.id, position)"
                                                    >
                                                        <span class="glyphicon glyphicon-remove-circle"></span>
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>ABCXGH</td>
                                                <td>25% off on Cardigan</td>
                                                <td>15/08/2016 00h00</td>
                                                <td>31/08/2016 00h00</td>
                                                <td><span class="label label-warning">Đang diễn ra</span></td>
                                                <td>Dầu nhờn</td>
                                                <td>Normal</td>
                                                <td class="text-center">
                                                    <a href="#newProvider" 
                                                       title="Xem chi tiết" 
                                                       class="btn-icon label-edit" 
                                                       data-toggle="modal" 
                                                       v-on:click="edit(position.id)">
                                                        <span class="glyphicon glyphicon-eye-open"></span>
                                                    </a>
                                                    
                                                    <a href="javascript:void(0)" 
                                                        title="Xóa"
                                                        class="btn-icon label-delete btn-xs handle-delete"
                                                        v-on:click="destroy(position.id, position)"
                                                    >
                                                        <span class="glyphicon glyphicon-remove-circle"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>ACDRED</td>
                                                <td>45% off on Boyfriend Jean</td>
                                                <td>15/11/2017 00h00</td>
                                                <td>20/11/2017 00h00</td>
                                                <td><span class="label label-default">Chưa bắt đầu</span></td>
                                                <td>Thiết bị làm sạch</td>
                                                <td>Tất cả</td>
                                                <td class="text-center">
                                                    <a href="#newProvider" 
                                                       title="Xem chi tiết" 
                                                       class="btn-icon label-edit" 
                                                       data-toggle="modal" 
                                                       v-on:click="edit(position.id)">
                                                        <span class="glyphicon glyphicon-eye-open"></span>
                                                    </a>
                                                    
                                                    <a href="javascript:void(0)" 
                                                        title="Xóa"
                                                        class="btn-icon label-delete btn-xs handle-delete"
                                                        v-on:click="destroy(position.id, position)"
                                                    >
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
