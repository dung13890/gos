<header>
    <div class="container-fluid">
        <!-- .logo -->
        <div class="logo pull-left">
            <a href="/" title="">
                <!-- <img src="/assets/img/logo.png" class="img-responsive" alt=""> -->
            </a>
        </div>

        <div id="menuMobileToggle" data-display="0" class="pull-right">
            <button class="fa fa-bars"></button>
        </div>

        <nav class="menu pull-right" references="menu-system">
            <ul>
                <li><a href="#">Lập báo giá <i class='glyphicon glyphicon-list-alt'></i></a></li>
                <li><a href="javascript:void(0)">Báo cáo tổng hợp <i class='glyphicon glyphicon-chevron-down'></i></a>
                    <ul class="submenu">
                        <li><a href="/user"><i class="glyphicon glyphicon-ok-circle"></i> Báo cáo hàng hóa</a></li>
                        <li><a href="/roles"><i class="glyphicon glyphicon-ok-circle"> </i> Báo cáo khách hàng</a></li>
                        <li><a href="/logout"><i class="glyphicon glyphicon-ok-circle"></i> Báo cáo doanh thu</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('customers.index') }}">Khuyến mãi - Tích điểm <i class="glyphicon glyphicon-shopping-cart"></i></a></li>
                <li><a href="#">Phiếu thu <i class="glyphicon glyphicon-equalizer"></i></a></li>
                <li><a href="#">Phiếu chi <i class="glyphicon glyphicon-equalizer"></i></a></li>
                <li>
                    <a href="javascript:void(0)">Cài đặt <span class="glyphicon glyphicon-cog"></span></a>
                    <ul class="submenu">
                        <li><a href="/user"><i class="glyphicon glyphicon-user"></i> Quản lý người dùng</a></li>
                        <li><a href="/roles"><i class="glyphicon glyphicon-lock"> </i> Quản lý nhóm quyền</a></li>
                        <li><a href="/logout"><i class="glyphicon glyphicon-wrench"></i> Cấu hình hệ thống</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" class="user-setting">{{ $me->fullname }}<span class="caret"></span></a>
                    <ul class="submenu">
                        <li><a data-toggle="modal" href="#profile"><i class="fa fa-wrench"> </i> Cài đặt</a></li>
                        <li><a data-toggle="modal" href='#password'><i class="fa fa-unlock"> </i> Đổi mật khẩu</a></li>
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
                        Danh mục hệ thống
                        <i class='glyphicon glyphicon-random'></i></a>
                    <ul class="sub-node-system">
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

                <li>
                    <a href="#"  title="Hóa đơn mua hàng">
                    <i class="glyphicon glyphicon-th-large"></i>&nbsp; Cân đối hàng tồn</a>
                </li>

                <li>
                    <a href="{{ route('customers.index') }}"  title="Hóa đơn mua hàng">
                    <i class="glyphicon glyphicon-th-large"></i>&nbsp; Khách hàng</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<modal-profile :item="itemProfile"></modal-profile>
<modal-password></modal-password>