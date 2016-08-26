@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style("assets/css/backend/bills/bill.css") }}
@endpush

@push('prescripts')
    {{ HTML::script("vendor/jQueryAutocomplete/jquery.autocomplete.min.js") }}
    <script type="text/javascript">
        

        $(document).ready(function() {
            var countries = [
               { value: 'Product 1', data: '1',  label: '<span class="hl_results">MySQL</span> in a Nutshell' },
               { value: 'Product 2', data: '2' },
               { value: 'Product 3', data: '3' },
               { value: 'Product 4', data: '4' },
               { value: 'Product 5', data: '5' },
               { value: 'Product 6', data: '6' },
               { value: 'Product 7', data: '7' },
               { value: 'Product 8', data: '8' },
               { value: 'Product 9', data: '9' },
               { value: 'Product 10', data: '10' },
            ];

            $('#autocomplete').autocomplete({
                lookup: countries,
                onSelect: function (result) {
                    var html = '<tr>';
                    html += '<td class="text-center">1</td>';
                    html += '<td class="text-center">' + result.data + '</td>';
                    html += '<td>' + result.value + '</td>';
                    html += '<td class="text-center">Cái</td>';
                    html += '<td>'
                    html += '<input type="text" class="form-control input-sm text-right" value="0" />';
                    html += '</td>';
                    html += '<td><input type="number" class="form-control input-sm text-right" value="" /></td>';
                    html += '<td><input type="text" class="form-control input-sm text-right" value="5%" /></td>';
                    html += '<td class="text-right">0</td>';
                    html += '<td class="text-center"></td>';
                    html += '<td class="text-center">';
                    html += '<a href="#" title="Xóa" class="btn-icon label-delete">';
                    html += '<span class="glyphicon glyphicon-remove-circle"></span>';
                    html += '</a>';
                    html += '</td>';
                    html += '</tr>';
                    $('tbody').append(html);
                }
            });
        })
    </script>
@endpush

@section('page-content')
<div id="BillsController">
    <div id="content">
        <div class="container-fluid">
            <h3 class="page-title">Hóa đơn mua hàng</h3>
            <div class="row">
                @include('backend.bill._info')
                <div class="col-md-9">
                    <div class="widget">
                        <div class="widget-heading">
                            <h1 class="title text-uppercase">Danh sách hàng hóa</h1>
                            <a href="javascript:;" class="toggle-content" references="#nhapkhomua" display="1">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>

                        <div id="nhapkhomua">
                            <div class="widget-tools">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <input type="text" 
                                            class="form-control input-sm input-suggest" 
                                            placeholder="Mã hoặc tên hàng hóa" 
                                            size="60px" 
                                            id="autocomplete"
                                        />
                                    </div>

                                    <div class="col-xs-7">
                                        <div class="text-right number-product">
                                           <span>
                                                <strong>Mặt hàng: </strong>
                                                <span>2</span>
                                            </span>

                                            <span>|</span>
                                            
                                            <span>
                                                <strong>Số lượng: </strong>
                                                <span>11</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-default table-bordered table-hover" name="test">
                                        <thead>
                                            <tr class="active">
                                                <th class="text-center">STT</th>
                                                <th class="text-center">Mã</th>
                                                <th>Tên sản phẩm</th>
                                                <th class="text-center">ĐVT</th>
                                                <th class="text-center" width="150">Đơn giá</th>
                                                <th class="text-center" width="100">Số lượng</th>
                                                <th class="text-center" width="100">Khuyễn mãi</th>
                                                <th class="text-right">Thành tiền</th>
                                                <th class="text-center">HSD</th>
                                                <th width="50"></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="widget-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-right">
                                            <button class="btn btn-success" type="submit">
                                                <i class="glyphicon glyphicon-floppy-disk"></i> Lưu
                                            </button>

                                            <button class="btn btn-info" type="submit">
                                                <i class="glyphicon glyphicon-floppy-disk"></i> Lưu và thêm mới
                                            </button>

                                            <button class="btn btn-primary" type="submit">
                                                <i class="glyphicon glyphicon-print"></i> Xem in
                                            </button>

                                            <button class="btn btn-warning" type="reset">
                                                <i class="glyphicon glyphicon-ban-circle"></i> Clear
                                            </button>
                                        </div>
                                    </div>
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
