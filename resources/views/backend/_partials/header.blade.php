<header>
    <div class="container-fluid" id="headerApp">
    <modal-profile :user-profile="userProfile" :errors="errors"></modal-profile>
    <modal-password :errors="errors"></modal-password>
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

                <li class="dropdown">
                    <a href="{{ route('reports.index') }}"> Báo cáo - Thống kê
                    <i class='glyphicon glyphicon-bullhorn'></i></a>
                </li>

                <li class="dropdown">
                    <a href="javascript::void(0)" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false">
                        Hệ thống <span class="glyphicon glyphicon-cog"></span>
                    </a>
                    <ul class="dropdown-menu submenu">
                        <li><a href="{{ route('promotions.index') }}">
                            <i class="glyphicon glyphicon-usd"></i> Khuyến mãi - Tích điểm</a>
                        </li>
                        <li>
                            <a href=""><i class="glyphicon glyphicon-wrench"></i> Cấu hình hệ thống</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown" id="notification">
                    <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
                        <span class="glyphicon glyphicon-bell notification-icon"></span>
                        <span class="badge notification-mes">3</span>
                    </a>
                        
                    <ul class="dropdown-menu notifications" role="menu" aria-labelledby="dLabel">
                        
                        <div class="notification-heading">
                            <h4 class="menu-title">Thông báo</h4>
                            <h4 class="menu-title pull-right">
                                <a href='{{ route("notifications.index") }}' title='Xem tất cả'>Xem tất cả</a>
                                <i class="glyphicon glyphicon-circle-arrow-right"></i>
                            </h4>
                        </div>
                        <li class="divider"></li>

                        <div class="notifications-wrapper">
                            <a class="content" href="#">
                                <div class="notification-item notification-item-new">
                                    <h4 class="item-title">
                                        Phiếu yêu cầu mua hàng của bạn đã được duyệt bởi <b>Phạm Kỳ Khôi</b>
                                    </h4>
                                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> 1 phút trước</p>
                                </div>
                                <div class="notification-item notification-item-new">
                                    <h4 class="item-title">
                                        Phiếu yêu cầu mua hàng của bạn đã được duyệt bởi <b>Phạm Kỳ Khôi</b>
                                    </h4>
                                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> 1 phút trước</p>
                                </div>
                                <div class="notification-item notification-item-new">
                                    <h4 class="item-title">
                                        Phiếu yêu cầu mua hàng của bạn đã được duyệt bởi <b>Phạm Kỳ Khôi</b>
                                    </h4>
                                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> 1 phút trước</p>
                                </div>
                            </a>
                            @for($i = 1; $i <= 10; $i++)
                                <a class="content" href="#">
                                    <div class="notification-item">
                                        <h4 class="item-title">Hợp đồng số 00{{ $i }} đã được phê duyệt bởi <b>Phạm Kỳ Khôi</b></h4>
                                        <p><i class="fa fa-clock-o" aria-hidden="true"></i> 1 phút trước</p>
                                    </div>
                                </a>
                            @endfor
                        </div>
                        <li class="divider"></li>

                        <div class="notification-footer text-center">
                            <h4 class="menu-title">
                                <a href='{{ route("notifications.index") }}' title='Xem tất cả'>Xem tất cả</a>
                            </h4>
                        </div>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript::void(0)" data-toggle="dropdown" class="dropdown-toggle user-setting">
                        {{ $currentUser->fullname }}<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu submenu">
                        <li>
                            <a  href="#" v-on:click="profile">
                            <i class="fa fa-wrench"> </i> Thông tin tài khoản</a>
                        </li>
                        <li><a href="#" v-on:click="password">
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
                    <a href="javascript::void(0)" class="active">
                        <i class='glyphicon glyphicon-th-large'></i>
                        Thông tin chung
                    </a>
                    <ul class="sub-node-system">
                        <li>
                            <a href="{{ route('warehouses.index') }}">
                                <i class="glyphicon glyphicon-pushpin"></i> Khai báo kho
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('units.index') }}">
                                <i class="glyphicon glyphicon-pushpin"></i> Quản lý đơn vị tính
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('products.index') }}">
                                <i class="glyphicon glyphicon-pushpin"></i> Quản lý hàng hóa
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('categories.type', 'product') }}">
                                <i class="glyphicon glyphicon-pushpin"></i> Quản lý nhóm hàng hóa
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('customergroups.index') }}">
                                <i class="glyphicon glyphicon-pushpin"></i> Nhóm khách hàng
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('customergroups.index', ['type' => 'supplier']) }}">
                                <i class="glyphicon glyphicon-pushpin"></i> Nhóm nhà cung cấp
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
                            <a href="{{ url('bills/symmetrical') }}"  title="Cân đối hàng tồn">
                            <i class="glyphicon glyphicon-pushpin"></i>&nbsp; Cân đối hàng tồn</a>
                        </li>
                    </ul>
                </li>

                <li class="node-system">
                    <a href="javascript::void(0)" title="Mua hàng phải trả">
                    <i class="glyphicon glyphicon-th-large"></i>&nbsp; Mua hàng phải trả</a>
                    <ul class="sub-node-system">
                        <li>
                            <a href="{{ route('bill.stockrequisition') }}"  title="Phiếu yêu cầu mua hàng">
                            <i class="glyphicon glyphicon-pushpin"></i>&nbsp; Phiếu yêu cầu mua hàng</a>
                        </li>

                        <li>
                            <a href="javascript::void(0);"  title="Hợp đồng mua">
                                <i class="glyphicon glyphicon-pushpin"></i>&nbsp; Hợp đồng mua
                                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
                            </a>
                            <ul class="sub-right-menu">
                                <li>
                                    <a href="">
                                        Danh sách mẫu hợp đồng
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('contracts.index') }}" title="Danh sách hợp đồng">
                                        Danh sách hợp đồng
                                    </a>
                                </li>

                                <li>
                                    <a href="">
                                        Tiến độ hợp đồng
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="{{ route('locations.index') }}"  title="Kế hoạch mua hàng">
                            <i class="glyphicon glyphicon-pushpin"></i>&nbsp; Kế hoạch mua hàng</a>
                        </li>

                        <li>
                            <a href="{{ route('locations.index') }}"  title="Đơn mua hàng">
                            <i class="glyphicon glyphicon-pushpin"></i>&nbsp; Đơn mua hàng</a>
                        </li>

                        <li>
                            <a href="{{ route('locations.index') }}"  title="Hợp đồng nhà cung cấp">
                            <i class="glyphicon glyphicon-pushpin"></i>&nbsp; Tiến độ đơn hàng, hợp đồng</a>
                        </li>

                        <li>
                            <a href="{{ route('locations.index') }}"  title="Đề nghị thanh toán">
                            <i class="glyphicon glyphicon-pushpin"></i>&nbsp; Đề nghị thanh toán</a>
                        </li>
                    </ul>
                </li>

                <li class="node-system">
                    <a href="javascript::void(0)" title="Bán hàng phải thu">
                    <i class="glyphicon glyphicon-th-large"></i>&nbsp; Bán hàng phải thu</a>
                    <ul class="sub-node-system">
                        <li>
                            <a href="{{ route('quotations.create') }}"  title="Phiếu báo giá">
                            <i class="glyphicon glyphicon-pushpin"></i>&nbsp; Phiếu báo giá</a>
                        </li>

                        <li>
                            <a href="{{ route('quotations.create') }}"  title="Hóa đơn bán hàng">
                            <i class="glyphicon glyphicon-pushpin"></i>&nbsp; Hóa đơn bán hàng</a>
                        </li>

                        <li>
                            <a href="{{ route('quotations.create') }}"  title="Hàng trả lại">
                            <i class="glyphicon glyphicon-pushpin"></i>&nbsp; Hàng trả lại</a>
                        </li>

                        <li>
                            <a href="{{ route('quotations.create') }}"  title="Phiếu điều chuyển kho">
                            <i class="glyphicon glyphicon-pushpin"></i>&nbsp; Phiếu điều chuyển kho</a>
                        </li>
                    </ul>
                </li>

                <li class="node-system">
                    <a href="{{ url('bills/buy') }}"  title="Quản lý kho">
                    <i class="glyphicon glyphicon-th-large"></i>&nbsp; Quản lý kho</a>
                    <ul class="sub-node-system">
                        <li>
                            <a href="{{ route('quotations.create') }}"  title="Phiếu nhập kho">
                            <i class="glyphicon glyphicon-pushpin"></i>&nbsp; Phiếu nhập kho</a>
                        </li>

                        <li>
                            <a href="{{ route('quotations.create') }}"  title="Phiếu xuất kho">
                            <i class="glyphicon glyphicon-pushpin"></i>&nbsp; Phiếu xuất kho</a>
                        </li>

                        <li>
                            <a href="{{ route('quotations.create') }}"  title="Chuyển kho nội bộ">
                            <i class="glyphicon glyphicon-pushpin"></i>&nbsp; Chuyển kho nội bộ</a>
                        </li>

                        <li>
                            <a href="{{ route('quotations.create') }}"  title="Xuất kho khác">
                            <i class="glyphicon glyphicon-pushpin"></i>&nbsp; Xuất kho khác</a>
                        </li>

                        <li>
                            <a href="{{ route('quotations.create') }}"  title="Nhập kho mua hàng">
                            <i class="glyphicon glyphicon-pushpin"></i>&nbsp; Xuất kho bán hàng</a>
                        </li>
                    </ul>
                </li>

                <li class="node-system">
                    <a href="{{ url('bills/warehousetransfer') }}"  title="Chăm sóc khách hàng">
                    <i class="glyphicon glyphicon-th-large"></i>&nbsp; Chăm sóc khách hàng</a>
                    <ul class="sub-node-system">
                        <li>
                            <a href="{{ route('customers.index') }}"  title="Khách hàng">
                            <i class="glyphicon glyphicon-user"></i>&nbsp; Khách hàng</a>
                        </li>
                    </ul>
                </li>
                <li class="node-system">
                    <a href="javascript::void(0);"  title="Nhân sự">
                    <i class="glyphicon glyphicon-th-large"></i>&nbsp; Nhân sự</a>
                    <ul class="sub-node-system">
                        <li>
                            <a href="{{ route('locations.index') }}"  title="Quản lý khu vực">
                            <i class="glyphicon glyphicon-pushpin"></i>&nbsp; Quản lý địa điểm</a>
                        </li>

                        <li>
                            <a href="{{ route('branches.index') }}">
                                <i class="glyphicon glyphicon-pushpin"></i> Quản lý chi nhánh
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('rooms.index') }}">
                                <i class="glyphicon glyphicon-pushpin"></i> Quản lý phòng ban
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('positions.index') }}">
                                <i class="glyphicon glyphicon-pushpin"></i> Quản lý chức vụ
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('permissions.index') }}">
                                <i class="glyphicon glyphicon-pushpin"> </i> Quản lý quyền
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('roles.index') }}">
                                <i class="glyphicon glyphicon-pushpin"> </i> Quản lý nhóm quyền
                            </a>
                        </li>

                        <li>
                            <a href="/user">
                                <i class="glyphicon glyphicon-user"></i> Quản lý người dùng
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ url('bills/exportstock') }}"  title="Xuất hàng trả lại">
                    <i class="glyphicon glyphicon-th-large"></i>&nbsp; Quản lý sản xuất</a>
                </li>

                <li>
                    <a href="{{ url('bills/importstock') }}"  title="Nhập hàng trả lại">
                    <i class="glyphicon glyphicon-th-large"></i>&nbsp; Tài sản cố định</a>
                </li>

                <li>
                    <a href="{{ url('bills/importstock') }}"  title="Nhập hàng trả lại">
                    <i class="glyphicon glyphicon-th-large"></i>&nbsp; Kế toán</a>
                </li>
            </ul>
        </nav>
    </div>
</div>


