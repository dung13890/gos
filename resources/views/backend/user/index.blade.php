@extends('layouts.backend')

@section('title',isset($heading) ? $heading : 'Index')

@push('prestyles')
{{ HTML::style('vendor/datatables-bs/css/dataTables.bootstrap.min.css') }}
@endpush

@push('prescripts')
{{ HTML::script("vendor/datatables/js/jquery.dataTables.min.js") }}
{{ HTML::script("vendor/datatables-bs/js/dataTables.bootstrap.min.js") }}
<script>
    var flash_message = '{!!session("flash_message")!!}';
    var datatableRoute = '{!! route('user.data') !!}';
    var datatableColumns = [
        { data: 'id', name: 'id', searchable: false },
        { data: 'username', name: 'username'},
        { data: 'email', orderable: true, name: 'email'},
        { data: 'rooms', orderable: true, name: 'rooms'},
        { data: 'actions', name: 'actions', orderable: false, searchable: false, sClass: "text-center"}
    ];
    var datatableOptions = {
        createdRow: function ( row, data, index ) {
            $('td', row).eq(0).css('display','none');
            if (data.actions.show) {
                $('td', row).eq(1).html('<a title="'+data.actions.show.label+'" href="'+data.actions.show.uri+'">'+data.username+'</a>');
            }
            var actions = data.actions;
            if (!actions || actions.length < 1) { return; }
            var actionHtml = $('td', row).eq(4);
            actionHtml.html('');
            if (actions.edit) { 
                actionHtml.append('<a title ="'+actions.edit.label+'" class="btn btn-default btn-xs" href="'+actions.edit.uri+'"><i class="fa fa-pencil"></i></a>');
            }
            if (actions.delete) { 
                actionHtml.append('<a title ="'+actions.delete.label+'" class="btn btn-danger btn-xs handle-delete" href="'+actions.delete.uri+'"><i class="fa fa-times"></i></a>');
            }
        }
    };
    $(function(){
        renderTable(datatableRoute, datatableColumns, datatableOptions, function () {
            $('.handle-delete').click(function (e) {
                e.preventDefault();
                alertDestroy($(this).attr('href'));
            });
        });
    });
</script>
@endpush

@section('page-content')
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
                {{ Form::model($item, ['method' => 'PATCH','url' => route('user.update', $item->id), 'role'  => 'form', 'autocomplete'=>'off']) }}
                    @include('backend.user._form')
                {{ Form::close() }}
                @else
                {{ Form::open(['url' => route('user.store'), 'autocomplete'=>'off']) }}
                    @include('backend.user._form')
                {{ Form::close() }}
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-9">
        <div class="widget">
            <div class="widget-heading">
                <h1 class="title text-uppercase">{{ $heading or 'Index' }}</h1>
                <a href="javascript:;" class="toggle-content" references="#userList" display="1">
                    <i class="fa fa-angle-down"></i>
                </a>
            </div>
            <div id="userList">
                <div class="widget-tools">
                    <div class="row">
                        <div class="col-sm-6">
                            
                        </div>
                        <div class="col-sm-6 text-right">
                            <div class="tool">
                                <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle">
                                        <span class="fa fa-users"></span>
                                        Phòng ban
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Quản trị</a></li>
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
@endsection