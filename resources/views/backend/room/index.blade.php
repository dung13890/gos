@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style('vendor/datatables-bs/css/dataTables.bootstrap.min.css') }}
    {{ HTML::style("vendor/datepicker/css/bootstrap-datepicker.min.css") }}
    {{ HTML::style('vendor/jasny-bootstrap/css/jasny-bootstrap.min.css') }}
@endpush

@push('prescripts')
    {{ HTML::script("vendor/datatables/js/jquery.dataTables.min.js") }}
    {{ HTML::script("vendor/datatables-bs/js/dataTables.bootstrap.min.js") }}
    {{ HTML::script('vendor/datepicker/js/bootstrap-datepicker.min.js') }}
    {{ HTML::script('vendor/jasny-bootstrap/js/jasny-bootstrap.min.js') }}

    <script>
        var flash_message = '{!! session("flash_message") !!}';
        var datatableRoute = '{!! route('rooms.data') !!}';
    </script>

    {{ HTML::script('assets/js/backend/rooms/datatable.js') }}
    {{ HTML::script("assets/vue/room.js") }}
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
                        <!-- widget-heading -->
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Danh sách phòng ban</h1>
                            <a href="javascript:;" class="toggle-content" references="#providerList" display="1">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>
                        
                        <div id="providerList">
                            <!-- widget-tools -->
                            @include('backend.room._tool')
                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-default table-bordered table-hover" id="table-index">
                                        <thead>
                                            <tr class="active">
                                                <th style="display:none">ID</th>
                                                <th class="text-center">Mã</th>
                                                <th>Tên phòng</th>
                                                <th>Trưởng phòng</th>
                                                <th>Số nhân viên</th>
                                                <th>Ngày thành lập</th>
                                                <th width="100">Thao tác</th>
                                            </tr>
                                        </thead>
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
