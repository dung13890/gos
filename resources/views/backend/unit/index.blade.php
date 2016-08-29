@extends('layouts.backend')

@section('title', isset($heading) ? $heading : 'Index')

@push('prestyles')

@endpush

@push('prescripts')
    {{ HTML::script("assets/vue/units/unit.js") }}
@endpush

@section('page-content')
<div id="UnitsController">
    @include('backend.unit._form')
    <div id="content">
        <div class="container-fluid">
            <h3>Quản lý đơn vị tính</h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget">
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Danh sách đơn vị tính</h1>
                            <a href="javascript:;" class="toggle-content" references="#unitList" display="1">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>

                        <div id="unitList">
                            @include('backend.unit._tool')
                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-default table-bordered table-hover" id="table-index">
                                        <thead>
                                            <tr class="active">
                                                <th>Tên</th>
                                                <th>Ký hiệu</th>
                                                <th>Mô tả</th>
                                                <th width='100'>Thao tác</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr v-for="unit in units">
                                                <td>@{{ unit.name }}</td>
                                                <td>@{{ unit.short_name }}</td>
                                                <td>@{{ unit.description }}</td>
                                                <td class="text-center">
                                                    <a href="#newUnit"
                                                        title="Sửa"
                                                        class="btn-icon label-edit"
                                                        data-toggle="modal"
                                                        v-on:click="edit(unit.id)">
                                                        <span class="glyphicon glyphicon-edit"></span>
                                                    </a>

                                                    <a href="javascript:void(0);" title="Xóa" 
                                                        class="btn-icon label-delete"
                                                        v-on:click="destroy(unit.id, unit)">
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