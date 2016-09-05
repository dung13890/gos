
<header>
    <div class="container-fluid">
        <div class="logo pull-left">
            <a href="/" title="">
                <img src="/assets/img/logo.png" class="img-responsive" alt="">
            </a>
        </div>

        <div id="menuMobileToggle" data-display="0" class="pull-right">
            <button class="fa fa-bars"></button>
        </div>

        <nav class="menu pull-right" references="menu-system">
            <ul>
                <li>
                    <a href="{{ route('customers.index') }}"  title="Khách hàng">
                    <i class="glyphicon glyphicon-user"></i>&nbsp; Khách hàng</a>
                </li>
                
                <li>
                    <a href="#"  title="Kinh doanh">
                    <i class="glyphicon glyphicon-bullhorn"></i>&nbsp; Kinh doanh</a>
                </li>

                <li><a href="{{ route('quotations.create') }}">Lập báo giá <i class='glyphicon glyphicon-list-alt'></i></a></li>
                
                <li>
                    <a href="{{ route('reports.index') }}">Báo cáo - Thống kê 
                    <i class='glyphicon glyphicon-bullhorn'></i></a>
                </li>

                <li><a href="{{ route('promotions.index') }}">Khuyến mãi - Tích điểm <i class="glyphicon glyphicon-usd"></i></a></li>
                <li><a href="#">Phiếu thu <i class="glyphicon glyphicon-equalizer"></i></a></li>
                <li><a href="#">Phiếu chi <i class="glyphicon glyphicon-equalizer"></i></a></li>
                
                <li class="dropdown">
                    <a href="javascript::void(0)" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false">
                        Hệ thống<span class="glyphicon glyphicon-cog"></span>
                    </a>
                    <ul class="dropdown-menu submenu">
                        <li><a href="/user"><i class="glyphicon glyphicon-user"></i> Quản lý người dùng</a></li>
                        <li><a href="{{ route('roles.index') }}"><i class="glyphicon glyphicon-lock"> </i> Quản lý nhóm quyền</a></li>
                        <li><a href="{{ route('permissions.index') }}"><i class="glyphicon glyphicon-lock"> </i> Quản lý quyền</a></li>
                        <li><a href=""><i class="glyphicon glyphicon-wrench"></i> Cấu hình hệ thống</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript::void(0)" data-toggle="dropdown" class="dropdown-toggle user-setting">
                        {{ $currentUser->fullname }}<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu submenu">
                        <li>
                            <a data-toggle="modal" href="#profile">
                            <i class="fa fa-wrench"> </i> Thông tin tài khoản</a>
                        </li>
                        <li><a data-toggle="modal" href='#passwordReset'>
                            <i class="fa fa-unlock"> </i> Đổi mật khẩu</a>
                        </li>
                        <li><a href="/logout"><i class="glyphicon glyphicon-off"> </i> Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</header>

<div id="tasks">
    <div class="container-fluid">
        <nav class="menu" references="menu-tasks">
            <ul>
                <li class="node-system">
                    <a href="javascript:void(0)" class="active">
                        Danh mục
                        <i class='glyphicon glyphicon-random'></i></a>
                    <ul class="sub-node-system">
                        <li>
                            <a href="{{ route('bills.index') }}">
                                <i class="glyphicon glyphicon-pushpin"></i> Quản lý chứng từ
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('products.index') }}">
                                <i class="glyphicon glyphicon-pushpin"></i> Quản lý hàng hóa vật tư
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('groupproducts.index') }}">
                                <i class="glyphicon glyphicon-pushpin"></i> Quản lý nhóm hàng hóa
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('groupcustomers.index') }}">
                                <i class="glyphicon glyphicon-pushpin"></i> Quản lý nhóm khách hàng
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('units.index') }}">
                                <i class="glyphicon glyphicon-pushpin"></i> Quản lý đơn vị tính
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-pushpin"></i> Quản lý mã vạch
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('manufacturers.index') }}">
                                <i class="glyphicon glyphicon-pushpin"></i> Quản lý hãng sản xuất
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('providers.index') }}">
                                <i class="glyphicon glyphicon-pushpin"></i> Quản lý nhà cung cấp
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('warehouses.index') }}">
                                <i class="glyphicon glyphicon-pushpin"></i> Quản lý kho
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('branches.index') }}">
                                <i class="glyphicon glyphicon-pushpin"></i> Quản lý chi nhánh
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('positions.index') }}">
                                <i class="glyphicon glyphicon-pushpin"></i> Quản lý chức vụ
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('rooms.index') }}">
                                <i class="glyphicon glyphicon-pushpin"></i> Quản lý phòng ban
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('bills/symmetrical') }}"  title="Cân đối hàng tồn">
                            <i class="glyphicon glyphicon-pushpin"></i>&nbsp; Cân đối hàng tồn</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ url('bills/sale') }}"  title="Hóa đơn bán hàng">
                    <i class="glyphicon glyphicon-th-large"></i>&nbsp; Hóa đơn bán hàng</a>
                </li>

                <li>
                    <a href="{{ url('bills/wholesale') }}"  title="Bán buôn - Bán sỉ">
                    <i class="glyphicon glyphicon-th-large"></i>&nbsp; Bán buôn - Bán sỉ</a>
                </li>

                <li>
                    <a href="{{ url('bills/buy') }}"  title="Hóa đơn mua hàng">
                    <i class="glyphicon glyphicon-th-large"></i>&nbsp; Hóa đơn mua hàng</a>
                </li>

                <li>
                    <a href="{{ url('bills/warehousetransfer') }}"  title="Chuyển kho nội bộ">
                    <i class="glyphicon glyphicon-th-large"></i>&nbsp; Chuyển kho nội bộ</a>
                </li>
                <li>
                    <a href="{{ url('bills/destroystock') }}"  title="Phiếu hủy hàng">
                    <i class="glyphicon glyphicon-th-large"></i>&nbsp; Phiếu hủy hàng</a>
                </li>

                <li>
                    <a href="{{ url('bills/exportstock') }}"  title="Xuất hàng trả lại">
                    <i class="glyphicon glyphicon-th-large"></i>&nbsp; Xuất hàng trả lại</a>
                </li>
                
                <li>
                    <a href="{{ url('bills/importstock') }}"  title="Nhập hàng trả lại">
                    <i class="glyphicon glyphicon-th-large"></i>&nbsp; Nhập hàng trả lại</a>
                </li>

            </ul>
        </nav>
    </div>
</div>

@include('backend.user._profile')
@include('backend.user._password')
