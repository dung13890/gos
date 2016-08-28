@extends('layouts.backend')

@push('prescripts')
    {{ HTML::script("assets/vue/branches/branch.js") }}
@endpush

@section('page-content')
<div id="BranchesController">
    
    @include('backend.branch._form')
    
    <div id="content">
        <div class="container-fluid">
            <h3>Quản lý chi nhánh</h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget">
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Danh sách chi nhánh</h1>
                            <a href="javascript:;" class="toggle-content" references="#providerList" display="1">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>
                        
                        <div id="providerList">
                            
                            @include('backend.branch._tool')

                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-default table-bordered table-hover" id="table-index">
                                        <thead>
                                            <tr class="active">
                                                <th style="display:none">ID</th>
                                                <th width="100">Mã</th>
                                                <th width="250">Tên chi nhánh</th>
                                                <th>Địa chỉ</th>
                                                <th>Trạng thái</th>
                                                <th width="200">Thuộc vùng áp dụng</th>
                                                <th width="100" class="text-center">Thao tác</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr v-for="branch in branches">
                                                <td>@{{ branch.code }}</td>
                                                <td>@{{ branch.name }}</td>
                                                <td>@{{ branch.address }}</td>
                                                <td>
                                                    <span v-if="branch.status" class="label label-success">Đang hoạt động</span>
                                                    <span v-else class="label label-default">Ngừng hoạt động</span>
                                                </td>
                                                <td>Hà Nội</td>
                                                <td class="text-center">
                                                    <a href="#newBranch"
                                                        title="Sửa"
                                                        class="btn-icon label-edit"
                                                        data-toggle="modal"
                                                        v-on:click="edit(branch.id)"
                                                    >
                                                        <span class="glyphicon glyphicon-edit"></span>
                                                    </a>

                                                    <a href="javascript:void(0);" title="Xóa" 
                                                        class="btn-icon label-delete"
                                                        v-on:click="destroy(branch.id, branch)"
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
