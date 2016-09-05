@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style("assets/css/backend/checkbox-radiobox.css") }}
    {{ HTML::style("assets/css/backend/permissions/permission.css") }}
@endpush

@push('prescripts')
    {{ HTML::script("assets/vue/permissions/permission.js") }}
@endpush

@section('page-content')
<div id="PermissionsController">
    
    @include('backend.permission._form')
    
    <div id="content">
        <div class="container-fluid">
            <h3>
                Quản lý quyền
                <a href="#newPermission" role="button" class="btn btn-success pull-right" data-toggle="modal">
                    <i class="fa fa-plus"></i> Thêm mới quyền
                </a>
            </h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget">
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Danh sách quyền</h1>
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
                                                <th width="10" class="text-center">ID</th>
                                                <th width="200">Tên quyền</th>
                                                <th width="150"></th>
                                                <th width="150">Mô tả</th>
                                                <th width="20" class="text-right">Thao tác</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr style=" background: #e3eff1;">
                                                <td></td>
                                                <td><input type="" name="" class="form-control input-sm" /></td>
                                                <td><input type="" name="" class="form-control input-sm" /></td>
                                                <td><input type="" name="" class="form-control input-sm" /></td>
                                                <td class="text-right">
                                                    <button type="button" class="btn btn-info btn-filter">
                                                        <span class="glyphicon glyphicon-search"></span> Tìm kiếm
                                                    </button>

                                                    <button type="button" class="btn btn-danger btn-filter">
                                                        <span class="glyphicon glyphicon glyphicon-ban-circle"></span> Reset
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr v-for='permission in permissions'>
                                                <td class="text-center">@{{ permission.id }}</td>
                                                <td>@{{ permission.name }}</td>
                                                <td>@{{ permission.slug }}</td>
                                                <td>@{{ permission.description }}</td>
                                                <td class="text-right">
                                                    <a href="#newPermission"
                                                        title="Sửa" 
                                                        v-on:click="edit(permission.id)"
                                                        class="btn-icon label-edit" data-toggle="modal">
                                                        <span class="glyphicon glyphicon-edit"></span>
                                                    </a>

                                                    <a href="javascript:void(0)" 
                                                        title="Xóa"
                                                        class="btn-icon label-delete btn-xs handle-delete"
                                                        v-on:click="destroy(permission.id, permission)"
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
