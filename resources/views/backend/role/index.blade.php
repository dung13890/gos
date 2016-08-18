@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style('vendor/bootstrap-switch/css/bootstrap-switch.min.css') }}
    {{ HTML::style('assets/css/backend/roles/role.css') }}
@endpush

@push('prescripts')
    {{ HTML::script('vendor/bootstrap-switch/js/bootstrap-switch.min.js') }}
    <script type="text/javascript">
        $('.on-off').bootstrapSwitch();
    </script>
@endpush

@section('page-content')
    <div id="new-role" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Thêm mới nhóm quyền</h4>
                </div>
                <div class="modal-body">
                    <form action="" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="required-wrapper">
                                    <input type="text" class="form-required input-sm" placeholder="Tên nhóm quyền" />
                                    <span class="fa fa-exclamation"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <textarea name="" id="" class="form-control input-sm" rows="5" placeholder="Mô tả"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label class="lineside text-center title-permission">
                                    <span class="text">Những quyền hạn được phép</span>
                                </label>

                                <div class="col-xs-6 list-permission">
                                    @for($i = 1; $i <= 15; $i++)
                                        <div class="permission-onoff">
                                            Được quyền import và export <input type="checkbox" class="on-off" name="my-checkbox" data-size="mini" />
                                        </div>
                                    @endfor
                                </div>

                                <div class="col-xs-6 list-permission">
                                    @for($i = 1; $i <= 15; $i++)
                                        <div class="permission-onoff pull-right">
                                            Được quyền import và export <input type="checkbox" class="on-off" name="my-checkbox" data-size="mini" />
                                        </div>
                                    @endfor
                                </div>
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
            <h3>Quản lý nhóm quyền</h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget">
                        <!-- widget-heading -->
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Danh sách nhóm quyền</h1>
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
                                                    <input type="text" class="form-control input-sm searchinput" placeholder="Tìm theo tên" size="40px" />
                                                    <span class="glyphicon glyphicon-remove-circle searchclear"></span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <div class="tool">
                                            <a href="#new-role" role="button" class="btn btn-sm" data-toggle="modal">
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
                                    </div>
                                </div>
                            </div>

                            <!-- widget-content -->
                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-default table-bordered table-hover" name="test">
                                        <thead>
                                            <tr class="active">
                                                <th class="text-center" width="50">STT</th>
                                                <th>Tên</th>
                                                <th>Mô tả</th>
                                                <th width="100">Thao tác</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @for($i = 1; $i <= 10; $i++)
                                            <tr>
                                                <td class="text-center">{{ $i }}</td>
                                                <td>Admin {{ $i }}</td>
                                                <td>km</td>
                                                <td>...</td>
                                            </tr>
                                            @endfor
                                        </tbody>
                                    </table>
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