@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style("assets/css/backend/checkbox-radiobox.css") }}
    {{ HTML::style('vendor/datatables-bs/css/dataTables.bootstrap.min.css') }}
    {{ HTML::style('assets/css/backend/roles/role.css') }}
@endpush

@push('prescripts')
    {{ HTML::script("vendor/datatables/js/jquery.dataTables.min.js") }}
    {{ HTML::script("vendor/datatables-bs/js/dataTables.bootstrap.min.js") }}
    {{ HTML::script("assets/vue/roles/role.js") }}
@endpush

@section('page-content')

<div id="RolesController">
    
    @include('backend.role._form')

    <div id="content">
        <div class="container-fluid">
            <h3>
                {{ trans('roles.role.page_title') }}
                <a href="#new-role"
                    role="button"
                    class="btn btn-success pull-right"
                    data-toggle="modal"
                    v-on:click="create()"
                >
                    <i class="fa fa-plus"></i> Thông tin form
                </a>
            </h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget">
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Danh sách nhóm quyền</h1>
                            <a href="javascript:;" class="toggle-content" references="#providerList" display="1">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>
                        
                        <div id="providerList">
                            <data-table></data-table>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
