@extends('layouts.backend')

@section('title', isset($heading) ? $heading : 'Index')

@push('prestyles')
    {{ HTML::style('vendor/datatables-bs/css/dataTables.bootstrap.min.css') }}
@endpush

@push('prescripts')
    {{ HTML::script("vendor/datatables/js/jquery.dataTables.min.js") }}
    {{ HTML::script("vendor/datatables-bs/js/dataTables.bootstrap.min.js") }}

    <script>
        var flash_message = '{!! session("flash_message") !!}';
        var datatableRoute = '/units/data';

        var datatableColumns = [
            {data: 'id', name: 'id', searchable: false},
            {data: 'name', name: 'name'},
            {data: 'short_name', name: 'short_name'},
            {data: 'description', name: 'description'},
            {data: 'actions', name: 'actions', orderable: false, searchable: false, sClass: "text-center"}
        ];

        var datatableOptions = {
            createdRow: function (row, data, index) {
                $('td', row).eq(0).css('display', 'none');
                if (data.actions.show) {
                    $('td', row).eq(1).html('<a title="' + data.actions.show.label + '" href="' + data.actions.show.uri + '">' + data.name + '</a>');
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
        });
    </script>
@endpush

@section('page-content')
    <!-- #content -->
    <div id="content">
        <div class="container-fluid">
            <h3>Quản lý đơn vị tính</h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget">
                        <!-- widget-heading -->
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Danh sách đơn vị tính</h1>
                            <a href="javascript:;" class="toggle-content" references="#unitList" display="1">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>

                        <div id="unitList">
                            <!-- widget-tools -->
                            @include('backend.unit._tool')

                            <!-- widget-content -->
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