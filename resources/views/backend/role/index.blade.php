@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style("assets/css/backend/checkbox-radiobox.css") }}
    {{ HTML::style('assets/css/backend/roles/role.css') }}
@endpush

@push('prescripts')
    {{ HTML::script("assets/vue/roles/role.js") }}
@endpush

@section('page-content')

<div id="RolesController">
    
    @include('backend.role._form')

    <div id="content">
        <div class="container-fluid">
            <h3>
                {{ trans('roles.role.page_title') }}
                <a href="#new-role"
                    role="button"
                    class="btn btn-success pull-right"
                    data-toggle="modal"
                    v-on:click="create()"
                >
                    <i class="fa fa-plus"></i> Thông tin form
                </a>
            </h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget">
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Danh sách nhóm quyền</h1>
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
                                                <th width="200">Tên nhóm quyền</th>
                                                <th width="150">Mô tả</th>
                                                <th style="width:50px;" class="text-center">Thao tác</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr v-for='role in roles'>
                                                <td class="text-center">@{{ role.id }}</td>
                                                <td>@{{ role.name }}</td>
                                                <td>@{{ role.description }}</td>
                                                <td class="text-center">
                                                    <a href="#new-role"
                                                        title="Sửa" 
                                                        v-on:click="edit(role.id)"
                                                        class="btn-icon label-edit" data-toggle="modal">
                                                        <span class="glyphicon glyphicon-edit"></span>
                                                    </a>

                                                    <a href="javascript:void(0)" 
                                                        title="Xóa"
                                                        class="btn-icon label-delete btn-xs handle-delete"
                                                        v-on:click="destroy(role.id, role)"
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
                                <!--  Pagination  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
