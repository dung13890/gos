@extends('layouts.backend')

@push('prescripts')
    {{ HTML::script("assets/vue/rooms/room.js") }}
@endpush

@section('page-content')

<div id="RoomsController">

    @include('backend.room._form')

    <div id="content">
        <div class="container-fluid">
            <h3>Quản lý phòng ban
                <a href="#newRoom" v-on:click="create" role="button" data-toggle="modal" class="btn btn-success pull-right">
                    <i class="fa fa-plus"></i> Thêm mới phòng ban
                </a>
            </h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget">

                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Danh sách phòng ban</h1>
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
                                            <th class="text-center" width="100">Mã</th>
                                            <th>Tên phòng</th>
                                            <th>Trưởng phòng</th>
                                            <th>Số nhân viên</th>
                                            <th>Ngày thành lập</th>
                                            <th width="100">Thao tác</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr style="background: #e3eff1;">
                                            <td><input type="" name="" class="form-control input-sm" /></td>
                                            <td><input type="" name="" class="form-control input-sm" /></td>
                                            <td><input type="" name="" class="form-control input-sm" /></td>
                                            <td></td>
                                            <td class="text-right" colspan="2">
                                                <button type="button" class="btn btn-info btn-filter">
                                                    <span class="glyphicon glyphicon-search"></span> Tìm kiếm
                                                </button>

                                                <button type="button" class="btn btn-danger btn-filter">
                                                    <span class="glyphicon glyphicon glyphicon-ban-circle"></span> Reset
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
