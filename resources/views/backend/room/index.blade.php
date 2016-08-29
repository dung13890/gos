@extends('layouts.backend')

@push('prescripts')
    {{ HTML::script("assets/vue/rooms/room.js") }}
@endpush

@section('page-content')

<div id="RoomsController">

    @include('backend.room._form')

    <div id="content">
        <div class="container-fluid">
            <h3>Quản lý phòng ban</h3>
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
                            
                            @include('backend.room._tool')

                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-default table-bordered table-hover" id="table-index">
                                        <thead>
                                            <tr class="active">
                                                <th class="text-center">Mã</th>
                                                <th>Tên phòng</th>
                                                <th>Trưởng phòng</th>
                                                <th>Số nhân viên</th>
                                                <th>Ngày thành lập</th>
                                                <th width="100">Thao tác</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr v-for="room in rooms">
                                                <td>@{{ room.code }}</td>
                                                <td>@{{ room.name }}</td>
                                                <td>@{{ room.manager }}</td>
                                                <td>@{{ room.member }}</td>
                                                <td>@{{ room.founding }}</td>
                                                
                                                <td class="text-center">
                                                    <a href="#newRoom"
                                                        title="Sửa"
                                                        class="btn-icon label-edit"
                                                        data-toggle="modal"
                                                        v-on:click="edit(room.id)">
                                                        <span class="glyphicon glyphicon-edit"></span>
                                                    </a>

                                                    <a href="javascript:void(0);" title="Xóa" 
                                                        class="btn-icon label-delete"
                                                        v-on:click="destroy(room.id, room)">
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
