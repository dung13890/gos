@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style('vendor/bootstrap-switch/css/bootstrap-switch.min.css') }}
    {{ HTML::style('assets/css/backend/roles/role.css') }}
@endpush

@push('prescripts')
    {{ HTML::script('vendor/bootstrap-switch/js/bootstrap-switch.min.js') }}
    <script type="text/javascript">
        $(function () {
            //$('.on-off').bootstrapSwitch();
            $('.handle-delete').click(function (e) {
                e.preventDefault();
                alertDestroy($(this).attr('href'));
            });
        });
        function bootstrapSwitch(selector) {
            return selector.bootstrapSwitch();
        }
    </script>
@endpush

@section('page-content')
<modal-role></modal-role>
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
                                        @foreach ($items as $item)
                                        <tr>
                                            <td class="text-center">{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>
                                                <a title ="xem" class="btn btn-default btn-xs" href="#new-role" data-id="{{ $item->id }}" data-toggle="modal"><i class="fa fa-pencil"></i></a>
                                                <a title ="xóa" class="btn btn-danger btn-xs handle-delete" href="{{ route('roles.destroy', $item->id) }}"><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="widget-footer">
                            <div class="text-right">
                                {{ $items->render() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection