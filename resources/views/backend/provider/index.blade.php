@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style('assets/css/backend/providers/provider.css') }}
@endpush

@section('page-content')
    <div id="newProvider" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Thêm mới nhà cung cấp</h4>
                </div>
                <div class="modal-body">
                    <form action="" class="form-horizontal">
                        <div class="form-group">

                                <div class="col-md-4">
                                    <div class="required-wrapper form-field">
                                        <input type="text" class="form-required input-sm" placeholder="Tên người liên hệ" />
                                        <span class="fa fa-exclamation"></span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="required-wrapper form-field">
                                        <input type="text" class="form-required input-sm" placeholder="Số điện thoại người liên hệ" />
                                        <span class="fa fa-exclamation"></span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="required-wrapper form-field">
                                        <input type="text" class="form-required input-sm" placeholder="Email người liên hệ" />
                                        <span class="fa fa-exclamation"></span>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <div class="required-wrapper form-field">
                                    <input type="text" class="form-required input-sm" placeholder="Tên công ty" />
                                    <span class="fa fa-exclamation"></span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <input type="text" class="form-required input-sm" placeholder="Mã số thuế" />
                                    <span class="fa fa-exclamation"></span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <input type="text" class="form-control input-sm" placeholder="Địa chỉ" />
                                </div>

                                <div class="required-wrapper form-field">
                                    <input type="text" class="form-control input-sm" placeholder="Fax"/>
                                </div>

                                <div class="required-wrapper form-field">
                                    <input type="text" class="form-control input-sm" placeholder="Email"/>
                                </div>

                                <div class="required-wrapper form-field">
                                    <input type="text" class="form-control input-sm" placeholder="Điện thoại"/>
                                </div>

                                <div class="required-wrapper form-field">
                                    <input type="Điện thoại" class="form-control input-sm" placeholder="Website"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="required-wrapper form-field">
                                    <input type="text" class="form-control input-sm" placeholder="Thông tin xuất hóa đơn"/>
                                </div>

                                <div class="required-wrapper form-field">
                                    <input type="text" class="form-control input-sm" placeholder="Nợ phải thu"/>
                                </div>

                                <div class="required-wrapper form-field">
                                    <input type="text" class="form-control input-sm" placeholder="Nợ phải trả"/>
                                </div>

                                <div class="required-wrapper form-field">
                                    <input type="text" class="form-control input-sm" placeholder="Giới hạn nợ"/>
                                </div>

                                <div class="required-wrapper form-field">
                                    <textarea class='form-control input-sm' placeholder="Ghi chú" rows='5'></textarea>
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
            <h3>Quản lý nhà cung cấp</h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget">
                        <!-- widget-heading -->
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Danh sách nhà cung cấp</h1>
                            <a href="javascript:;" class="toggle-content" references="#providerList" display="1">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>

                        <div id="providerList">
                            <!-- widget-tools -->
                            <div class="widget-tools">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <form action="" class="form-inline">
                                            <div class="form-group">
                                                <select name="rows" table-name="test" class="form-control input-sm">
                                                    <option value="---">Xem</option>
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                </select>
                                                
                                                <div class="btn-group">
                                                    <input type="text" class="form-control input-sm searchinput" placeholder="Tìm theo mã hoặc tên nhà cung cấp" size="50px" />
                                                    <span class="glyphicon glyphicon-remove-circle searchclear"></span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <div class="tool">
                                            <a href="#newProvider" role="button" class="btn btn-sm" data-toggle="modal">
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
                                    <table class="table table-condensed table-default table-bordered table-hover" name="test">
                                        <thead>
                                            <tr class="active">
                                                <th class="text-center">STT</th>
                                                <th class="text-center">Ảnh đại diện</th>
                                                <th class="text-center">Mã</th>
                                                <th>Tên nhà cung cấp</th>
                                                <th>Người liên hệ</th>
                                                <th>Điện thoại</th>
                                                <th>Địa chỉ</th>
                                                <th>Địa chỉ email</th>
                                                <th>Tên công ty</th>
                                                <th>Mã số thuế</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @for($i = 1; $i <= 15; $i ++)
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">Ảnh</td>
                                                    <td class="text-center">SP0123</td>
                                                    <td>Samsung Galaxy S3</td>
                                                    <td class="text-center">Cái</td>
                                                    <td>2,000,000</td>
                                                    <td>100</td>
                                                    <td>5%</td>
                                                    <td>190,000,000</td>
                                                    <td class="text-center">01/12/2019</td>
                                                    <td class="text-center">
                                                        <a href="#newProvider" role="button" class="btn btn-sm" data-toggle="modal">
                                                            Sửa
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- widget-footer -->
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