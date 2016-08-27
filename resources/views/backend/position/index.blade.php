@extends('layouts.backend')

@push('prescripts')
    {{ HTML::script("assets/vue/positions/position.js") }}
@endpush

@section('page-content')
<div id="PositionsController">
    @include('backend.position._form')
    <div id="content">
        <div class="container-fluid">
            <h3>Quản lý chức vụ</h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget">
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Danh sách chức vụ</h1>
                            <a href="javascript:;" class="toggle-content" references="#providerList" display="1">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>
                        
                        <div id="providerList">
                        @include('backend.position._tool')
                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-default table-bordered table-hover" id="table-index">
                                        <thead>
                                            <tr class="active">
                                                <th style="display:none">ID</th>
                                                <th width="100">Mã</th>
                                                <th>Tên chức vụ</th>
                                                <th width="150">Ngày tạo</th>
                                                <th width="80" class="text-center">Thao tác</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr v-for="position in positions">
                                                <td>@{{ position.code }}</td>
                                                <td>@{{ position.name }}</td>
                                                <td>@{{ position.created_at }}</td>
                                                <td class="text-center">
                                                    <a href="#newProvider" 
                                                       title="Sửa thông tin" 
                                                       class="btn-icon label-edit" 
                                                       data-toggle="modal" 
                                                       v-on:click="edit(position.id)">
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
