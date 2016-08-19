@extends('layouts.backend')

@section('title',isset($heading) ? $heading : 'Index')

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
        var datatableRoute = '{!! isset($room->id) ? route('user.data.room', $room->id) : route('user.data') !!}';

        var datatableColumns = [
            {data: 'id', name: 'id', searchable: false},
            {data: 'username', name: 'username'},
            {data: 'email', orderable: true, name: 'email'},
            {data: 'phone', orderable: true, name: 'phone'},
            {data: 'rooms', orderable: true, name: 'rooms', searchable: false},
            {data: 'actions', name: 'actions', orderable: false, searchable: false, sClass: "text-center"}
        ];

        var datatableOptions = {
            createdRow: function (row, data, index) {
                $('td', row).eq(0).css('display', 'none');
                if (data.actions.show) {
                    $('td', row).eq(1).html('<a title="' + data.actions.show.label + '" href="' + data.actions.show.uri + '">' + data.username + '</a>');
                }
                var actions = data.actions;
                
                return ! actions || actions.length < 1;

                var actionHtml = $('td', row).eq(5);

                actionHtml.html('');

                if (actions.edit) { 
                    actionHtml.append('<a title ="' + actions.edit.label + '" class="btn btn-default btn-xs" href="' + actions.edit.uri + '"><i class="fa fa-pencil"></i></a>');
                }

                if (actions.delete) { 
                    actionHtml.append('<a title ="' + actions.delete.label + '" class="btn btn-danger btn-xs handle-delete" href="' + actions.delete.uri + '"><i class="fa fa-times"></i></a>');
                }
            }
        };

        $(function() {
            renderTable(datatableRoute, datatableColumns, datatableOptions, function () {
                $('.handle-delete').click(function (e) {
                    e.preventDefault();
                    alertDestroy($(this).attr('href'));
                });

                $('#table-index_wrapper .row:first').remove();

                $('.searchinput').keyup(function() {
                    $('#table-index').DataTable().search($(this).val()).draw() ;
                });
            });

            $(".input-datepicker").datepicker({
                todayHighlight: true, 
                format: 'dd/mm/yyyy', 
                orientation: 'bottom auto',
                language: "vi",
                endDate: 'd'
            });
        });
    </script>
@endpush

@section('page-content')
<div id="content">
    <div class="container-fluid">
        <h3>{{ $heading or 'Index' }}</h3>
        <div class="row">
            <div class="col-sm-3">
                <div id="sidebar">
                    <div class="sb-heading">
                        <h3 class="title text-uppercase">{{ $action }}</h3>
                        <a href="javascript:;" class="toggle-content" references="#sidebar .sb-content" display="1">
                            <i class="fa fa-angle-down"></i>
                        </a>
                    </div>
                    <div class="sb-content">
                        @if(isset($item))
                        {{ Form::model($item, ['method' => 'PATCH','url' => route('user.update', $item->id), 'role'  => 'form', 'files' => true, 'autocomplete'=>'off']) }}
                            @include('backend.user._form')
                        {{ Form::close() }}
                        @else
                        {{ Form::open(['url' => route('user.store'), 'files' => true, 'autocomplete'=>'off']) }}
                            @include('backend.user._form')
                        {{ Form::close() }}
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="widget">
                    <div class="widget-heading">
                        <h1 class="title text-uppercase">{{ $listHeading or 'list' }}</h1>
                        <a href="javascript:;" class="toggle-content" references="#userList" display="1">
                            <i class="fa fa-angle-down"></i>
                        </a>
                    </div>
                    <div id="userList">
                        <div class="widget-tools">
                            <div class="row">
                                <div class="col-sm-6">
                                    <form action="" class="form-inline">
                                        <div class="form-group" id="user-search">
                                            <div class="btn-group">
                                                <input type="search" aria-controls="table-index" class="form-control input-sm searchinput" 
                                                    placeholder="Tìm theo mã, tên, email hoặc phòng ban" size="40px" />
                                                <span class="glyphicon glyphicon-remove-circle searchclear"></span>
                                            </div>

                                            <div class="btn-group">
                                                <span class="btn btn-default btn-sm">{{ $room->name or 'Tất cả phòng ban' }}</span>
                                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" >
                                                    <i class="caret"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-left">
                                                    <li><a href="{{ route('user.index') }}">Tất cả phòng ban</a></li>
                                                        @foreach ($listRooms->slice(1) as $id => $name)
                                                    <li><a href="{{ route('user.room', $id) }}">{{ $name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <div class="tool">
                                        <a href="{{ route('user.index') }}" role="button" class="btn btn-sm">
                                            <i class="fa fa-plus"></i> {{ trans('repositories.create') }}
                                        </a>
                                    </div>
                                    <div class="tool">
                                        <a href="javascript:;" class="btn btn-sm">
                                            <i class="fa fa-sign-out"></i> Import
                                        </a>
                                    </div>
                                    <div class="tool">
                                        <div class="btn-group">
                                            <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle" aria-expanded="false">
                                                <span class="fa fa-sign-out"></span>
                                                Export
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Excel</a></li>
                                                <li><a href="#">PDF</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content">
                            <div class="table-responsive">
                                <table id="table-index" class="table table-condensed table-default table-bordered table-hover" width="100%">
                                    <thead>
                                        <tr class="active">
                                            <th style="display:none">ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Điện thoại</th>
                                            <th>Phòng</th>
                                            <th>Thao tác</th>
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
@endsection