@extends('layouts.backend')

@section('title', isset($heading) ? $heading : 'Index')

@push('prestyles')
{{ HTML::style('vendor/datatables-bs/css/dataTables.bootstrap.min.css') }}
@endpush

@push('prescripts')
    {{ HTML::script("vendor/datatables/js/jquery.dataTables.min.js") }}
    {{ HTML::script("vendor/datatables-bs/js/dataTables.bootstrap.min.js") }}
    {{ HTML::script("assets/vue/units/unit.js") }}
@endpush

@section('page-content')
<div id="UnitsController">
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
                            <data-table></data-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection        