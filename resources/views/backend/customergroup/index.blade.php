@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style("assets/css/backend/customergroups/customergroup.css") }}
    {{ HTML::style('vendor/datatables-bs/css/dataTables.bootstrap.min.css') }}
@endpush

@push('prescripts')
    {{ HTML::script("vendor/datatables/js/jquery.dataTables.min.js") }}
    {{ HTML::script("vendor/datatables-bs/js/dataTables.bootstrap.min.js") }}
    {{ HTML::script("assets/vue/customergroups/customergroup.js") }}
@endpush

@section('page-content')

<div id="GroupCustomersController">
    @include('backend.customergroup._form')
    <div id="content">
        <div class="container-fluid">
            <h3>
                Quản nhóm khách hàng
                <a href="javascript::void(0);"
                    role="button" class="btn btn-success pull-right"
                    v-on:click="create()">
                    <i class="fa fa-plus"></i>
                    Thêm mới nhóm khách hàng
                </a>
            </h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget">
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Danh sách</h1>
                            <a href="javascript:;" class="toggle-content" references="#providerList" display="1">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>
                        
                        <div id="providerList">
                            <div class="widget-content">
                                <div class="table-responsive">
                                    <data-table></data-table>
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
