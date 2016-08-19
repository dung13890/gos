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
    <div id="newUnit" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Thêm mới đơn vị tính</h4>
                </div>
                <div class="modal-body">
                    <form action="" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="required-wrapper">
                                    <input type="text" class="form-required input-sm" placeholder="Mã đơn vị tính" />
                                    <span class="fa fa-exclamation"></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="required-wrapper">
                                    <input type="text" class="form-required input-sm" placeholder="Tên đơn vị tính" />
                                    <span class="fa fa-exclamation"></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="text" class="form-control input-sm" placeholder="Ký hiệu"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <textarea name="" id="" class="form-control input-sm" rows="3" placeholder="Mô tả"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group text-center">
                            <button class="btn btn-success" type="submit">
                                <span class="glyphicon glyphicon-floppy-disk"></span> Lưu
                            </button>

                            <button class="btn btn-info" type="submit">
                                <span class="glyphicon glyphicon-floppy-disk"></span> Lưu và thêm mới
                            </button>

                            <button class="btn btn-warning" type="reset"><i class="glyphicon glyphicon-ban-circle"></i> Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                            <div class="widget-tools">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <form action="" class="form-inline">
                                            <div class="form-group">
                                                <select name="rows" table-name="test" class="form-control input-sm">
                                                    <option value="">Xem</option>
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                </select>
                                                
                                                <div class="btn-group">
                                                    <input type="text" class="form-control input-sm searchinput" placeholder="Tìm theo mã hoặc tên" size="50px" />
                                                    <span class="glyphicon glyphicon-remove-circle searchclear"></span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <div class="tool">
                                            <a href="#newUnit" role="button" class="btn btn-sm" data-toggle="modal">
                                                <i class="fa fa-plus"></i> Thêm mới
                                            </a>
                                        </div>
                                        <div class="tool">
                                            <a href="javascript:;" class="btn btn-sm">
                                                <i class="fa fa-sign-out"></i> Import
                                            </a>
                                        </div>
                                        <div class="tool">
                                            <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle">
                                                    <span class="fa fa-sign-out"></span>
                                                    Export
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Excel</a></li>
                                                    <li><a href="#">PDF</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tool">
                                            <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle">
                                                    <span class="fa fa-bars"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Item selected</a></li>
                                                    <li><a href="#">Item selected</a></li>
                                                    <li><a href="#">Item selected</a></li>
                                                    <li><a href="#">Item selected</a></li>
                                                    <li><a href="#">Item selected</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

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