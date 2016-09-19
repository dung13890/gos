@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style('vendor/datatables-bs/css/dataTables.bootstrap.min.css') }}
    {{ HTML::style("assets/css/backend/permissions/permission.css") }}
@endpush

@push('prescripts')
    {{ HTML::script("vendor/datatables/js/jquery.dataTables.min.js") }}
    {{ HTML::script("vendor/datatables-bs/js/dataTables.bootstrap.min.js") }}
    {{ HTML::script("assets/vue/categories/category.js") }}
@endpush

@section('page-content')
<div id="CategoryController">
    <modal-form 
        :item="item" 
        :modal-title="modalTitle" 
        :errors="errors" 
        :type = "'{{$type}}'"
    ></modal-form>
    <div id="content">
        <div class="container-fluid">
            <h3>
                Quản lý nhóm {{ trans('repositories.' . $type) }}
                <a v-on:click.prevent="create" role="button" class="btn btn-success pull-right">
                    <i class="fa fa-plus"></i> Thêm mới nhóm {{ trans('repositories.' . $type) }}
                </a>
            </h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget">
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Danh sách nhóm {{ trans('repositories.' . $type) }}</h1>
                            <a href="javascript:;" class="toggle-content" references="#providerList" display="1">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>
                        
                        <div id="providerList">
                            <data-table :type="'{{ $type }}'"></data-table>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection