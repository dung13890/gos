@extends('layouts.backend')

@push('prestyles')
    {{ HTML::style('/assets/css/backend/customers/customer.css') }}
@endpush

@section('page-content')
    <div id="content">
        <div class="container-fluid">
            <div id="customer">
                <div class="cus-heading">
                    <h1>THÔNG TIN KHÁCH HÀNG</h1>
                    <input type="text" class="input-sm" value="Trần Đức Liêm" size="50px" />
                    <a href="{{ route('customers.index') }}" class="btn btn-default btn-sm">Back</a>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="widget">
                            <!-- widget-content -->
                            <div class="widget-content">
                                <div class="cus-tabs">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#">Lịch sử mua hàng</a></li>
                                        <li><a href="#">Chi nhánh</a></li>
                                        <li><a href="#">Nhân viên kinh doanh</a></li>
                                        <li><a href="#">Công nợ</a></li>
                                    </ul>
                                </div>
                                @include('backend.customer._liability')
                            </div>

                            <!-- widget-footer -->
                            <div class="widget-footer">
                                <div class="text-right">
                                    <ul class="pagination">
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="widget">
                            <!-- widget-heading -->
                            <div class="widget-heading">
                                <h3 class="title text-uppercase">Thông tin chung</h3>
                                <a href="javascript:;" class="toggle-content" references="#userInfo" display="1">
                                    <i class="fa fa-angle-down"></i>
                                </a>
                            </div>

                            <!-- widget-content -->
                            <div class="widget-content" id="userInfo">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <ul class="cus-info">
                                            <li>
                                                <strong>Mã khách hàng: </strong>
                                                <div>KH123456789</div>
                                            </li>
                                            <li>
                                                <strong>Tên khách hàng: </strong>
                                                <div>Nguyễn Xuân Quỳnh</div>
                                            </li>
                                            <li>
                                                <strong>Loại khách hàng: </strong>
                                                <div>VIP</div>
                                            </li>
                                            <li>
                                                <strong>CMND: </strong>
                                                <div>145 771 835</div>
                                            </li>
                                            <li>
                                                <strong>Công nợ hiện tại: </strong>
                                                <div>1.000.000</div>
                                            </li>
                                            <li>
                                                <strong>Địa chỉ: </strong>
                                                <div>Xuân Quan - Văn Giang - Hưng Yên</div>
                                            </li>
                                            <li>
                                                <strong>Email: </strong>
                                                <div>nguyenxuanquynh2210vghy@gmail.com</div>
                                            </li>
                                            <li>
                                                <strong>Điện thoại: </strong>
                                                <div>0977.936.507</div>
                                            </li>
                                            <li>
                                                <strong>Chi chú: </strong>
                                                <div>HTML forms are the integral part of the web pages and applications, but styling the form controls manually one by one with CSS are often boring and tedious. Bootstrap greatly simplifies the process of styling and alignment of form controls like labels, input fields, selectboxes, textareas, buttons, etc. through predefined set of classes.</div>
                                            </li>
                                            <li>
                                                <strong>Ảnh đại diện: </strong>
                                                <div style="float: left; width: 100px; height: 100px;">
                                                    <img src="/assets/img/noavatar.png" alt="Avatar" class="img-responsive"/>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="widget">
                            <!-- widget-heading -->
                            <div class="widget-heading">
                                <h3 class="title text-uppercase">Thông tin công ty</h3>
                                <a href="javascript:;" class="toggle-content" references="#companyInfo" display="1">
                                    <i class="fa fa-angle-down"></i>
                                </a>
                            </div>

                            <!-- widget-content -->
                            <div class="widget-content" id="companyInfo">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <ul class="cus-info">
                                            <li>
                                                <strong>Tên công ty: </strong>
                                                <div>Công ty TNHH một hành viên XYZ</div>
                                            </li>
                                            <li>
                                                <strong>MST: </strong>
                                                <div>123 123 123 123 123</div>
                                            </li>
                                            <li>
                                                <strong>FAX: </strong>
                                                <div>0123 123 123</div>
                                            </li>
                                            <li>
                                                <strong>Đi động: </strong>
                                                <div>123 123 123 </div>
                                            </li>
                                            <li>
                                                <strong>Máy bàn: </strong>
                                                <div>234 234 234</div>
                                            </li>
                                            <li>
                                                <strong>Email: </strong>
                                                <div>tanphat@gmail.com</div>
                                            </li>
                                            <li>
                                                <strong>Website: </strong>
                                                <div>http://tanphat.vn/</div>
                                            </li>
                                            <li>
                                                <strong>Loại công ty: </strong>
                                                <div>Công ty cổ phần thương mại</div>
                                            </li>
                                            <li>
                                                <strong>Chi chú: </strong>
                                                <div>If you see the output of the above example in a laptop or desktop having screen or viewport width greater than or equal to 992px and less than 1200px you will find it has 4 rows where each row has 3 equal columns resulting in 3x4 grid layout.
                                                But just wait, the above example has a major alignment issue. If height of any column is taller than the other it doesn't clear properly and break the layout. To fix this, use the combination of a .clearfix class and the responsive utility classes.</div>
                                            </li>
                                        </ul>
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