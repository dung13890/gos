@extends('layouts.backend')

@push('prestyles')

@endpush

@push('prescripts')

@endpush

@section('page-content')
<div id="RoomsController">
    <div id="content">
        <div class="container-fluid">
            <h3>Thông báo của bạn</h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget">
                        <div class="widget-content">
                            <div class="notification-list">
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
                                @for($i = 1; $i <= 20; $i++)
                                    <a class="content" href="#">
                                        <div class="notification-item">
                                            <h4 class="item-title">Hợp đồng số 00{{ $i }} đã được phê duyệt bởi <b>Phạm Kỳ Khôi</b></h4>
                                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> 1 phút trước</p>
                                        </div>
                                    </a>
                                @endfor
                            </div>
                        </div>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
