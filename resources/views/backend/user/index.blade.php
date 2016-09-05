@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style("assets/css/backend/checkbox-radiobox.css") }}
    {{ HTML::style("assets/css/backend/users/user.css") }}
@endpush

@push('prescripts')
    {{ HTML::script("assets/vue/users/user.js") }}
@endpush

@section('page-content')
<div id="UsersController">
    
    @include('backend.user._form')

    <div id="content">
        <div class="container-fluid">
            <h3>
                Quản lý người dùng
                <a href="#newUser" role="button" class="btn btn-success pull-right" data-toggle="modal">
                    <i class="fa fa-plus"></i> Thêm mới người dùng
                </a>
            </h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget">
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Danh sách người dùng</h1>
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
                                                <th width="60" class="text-center">Mã</th>
                                                <th width="200">Họ và tên</th>
                                                <th width="150">Tên đăng nhập</th>
                                                <th width="150">Email</th>
                                                <th width="100">Điện thoại</th>
                                                <th width="180">Chức vụ</th>
                                                <th width="180">Phòng ban</th>
                                                <th width="80" class="text-center">Thao tác</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr style="    background: #e3eff1;">
                                                <td><input type="" name="" class="event-code"  size="8" /></td>
                                                <td><input type="" name="" class="form-control input-sm" /></td>
                                                <td><input type="text" name="" /></td>
                                                <td><input type="text" name="" /></td>
                                                <td><input type="text" name="" /></td>
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

                                            <tr v-for='user in users'>
                                                <td>@{{ user.code }}</td>
                                                <td>@{{ user.fullname }}</td>
                                                <td>@{{ user.username }}</td>
                                                <td>@{{ user.email }}</td>
                                                <td>@{{ user.phone }}</td>
                                                <td>Tất cả</td>
                                                <td>Vip</td>
                                                <td class="text-center">
                                                    <a href="#newUser"
                                                        title="Sửa" 
                                                        v-on:click="edit(user.id)"
                                                        class="btn-icon label-edit" data-toggle="modal">
                                                        <span class="glyphicon glyphicon-edit"></span>
                                                    </a>

                                                    <a href="javascript:void(0)" 
                                                        title="Xóa"
                                                        class="btn-icon label-delete btn-xs handle-delete"
                                                        v-on:click="destroy(user.id, user)"
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
