<header>
    <div class="container-fluid">
        <!-- .logo -->
        <div class="logo pull-left">
            <a href="/" title="">
                <img src="/assets/img/logo.png" class="img-responsive" alt="">
            </a>
        </div>
        <!-- .menu-toggle -->
        <div id="menuMobileToggle" data-display="0" class="pull-right">
            <button class="fa fa-bars"></button>
        </div>

        <!-- .menu -->
        <nav class="menu pull-right" references="menu-system">
            <ul>
                <li><a href="#">Quản lý kho <i class='glyphicon glyphicon-th'></i></a></li>
                <li><a href="{{ route('products.index') }}">Vật tư hàng hóa <i class='glyphicon glyphicon-shopping-cart'></i></a></li>
                <li><a href="{{ route('customers.index') }}">Quản lý khách hàng <i class="glyphicon glyphicon-user"></i></a></li>
                <li><a href="#">Chi nhánh <i class="glyphicon glyphicon-object-align-left"></i></a></li>
                <li><a href="#">Garas <i class="glyphicon glyphicon-sound-dolby"></i></a></li>
                <li><a href="#">Thiết lập <span class="glyphicon glyphicon-cog"></span></a></li>
                <li>
                    <a href="javascript:void(0)" class="user-setting">{{ $me->fullname }}<span class="caret"></span></a>
                    <ul class="submenu">
                        <li><a data-toggle="modal" href="#profile"><i class="fa fa-wrench"> </i> Cài đặt</a></li>
                        <li><a data-toggle="modal" href='#password'><i class="fa fa-unlock"> </i> Đổi mật khẩu</a></li>
                        <li><a href="/logout"><i class="fa fa-sign-out"> </i> Đăng xuất</a></li>
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
                <li>
                    <a href="#" class="active">
                    <i class='glyphicon glyphicon-retweet'></i>
                    Nghiệp vụ
                    <i class='glyphicon glyphicon-random'></i></a>
                </li>

                <li>
                    <a href="/providers"  title="Hóa đơn mua hàng">
                    <i class="glyphicon glyphicon-ok-circle"></i>&nbsp; Quản lý nhà cung cấp</a>
                </li>
                <li>
                    <a href="/rooms"  title="Phòng ban">
                    <i class="glyphicon glyphicon-ok-circle"></i>&nbsp; Quản lý phòng ban</a>
                </li>

                <li>
                    <a href="/units"  title="Đơn vị tính">
                    <i class="glyphicon glyphicon-ok-circle"></i>&nbsp; Đơn vị tính</a>
                </li>
                <li>
                    <a href="/roles"  title="Hóa đơn mua hàng">
                    <i class="glyphicon glyphicon-ok-circle"></i>&nbsp; Quản lý nhóm quyền</a>
                </li>

                <li>
                    <a href="#"  title="Hóa đơn mua hàng">
                    <i class="glyphicon glyphicon-ok-circle"></i>&nbsp; Nhập hàng trả lại</a>
                </li>

                <li>
                    <a href="#"  title="Hóa đơn mua hàng">
                    <i class="glyphicon glyphicon-ok-circle"></i>&nbsp; Xuất hàng trả lại</a>
                </li>

                <li>
                    <a href="#"  title="Hóa đơn mua hàng">
                    <i class="glyphicon glyphicon-ok-circle"></i>&nbsp; Phiếu hủy hàng hóa</a>
                </li>
            </ul>
        </nav>
    </div>
</div>