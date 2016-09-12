@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style("assets/css/backend/checkbox-radiobox.css") }}
    {{ HTML::style('vendor/datatables-bs/css/dataTables.bootstrap.min.css') }}
@endpush

@push('prescripts')
    {{ HTML::script("vendor/datatables/js/jquery.dataTables.min.js") }}
    {{ HTML::script("vendor/datatables-bs/js/dataTables.bootstrap.min.js") }}
    {{ HTML::script('assets/vue/locations/location.js') }}
@endpush

@section('page-content')

<div id="LocationsController">
    <div id="content">
        <div class="container-fluid">
            <h3>
                Quản lý địa điểm
                <a role="button" class="btn btn-success pull-right">
                    <i class="fa fa-plus"></i> Thêm mới địa điểm
                </a>
            </h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget">
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Danh sách địa điểm</h1>
                            <a href="javascript:;" class="toggle-content" references="#locationsList" display="1">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>

                        <div id="locationsList">
                            <data-table></data-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
