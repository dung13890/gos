<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BillsController extends Controller
{
    public function index()
    {
        return view('backend.bill.index');
    }

    /**
     * Hóa đơn bán hàng
     */
    public function sale()
    {
        return view('backend.bill.sale');
    }

    /**
     * Hóa đơn bán buôn bán sỉ
     */
    public function wholesale()
    {
        return view('backend.bill.wholesale');
    }

    /**
     * Hóa đơn bán mua hàng
     */
    public function buy()
    {
        return view('backend.bill.buy');
    }

    /**
     * Chuyển kho nội bộ
     */
    public function warehouseTransfer()
    {
        return view('backend.bill.warehouse_transfer');
    }

    /**
     * Phiếu hủy hàng hóa
     */
    public function destroyStock()
    {
        return view('backend.bill.destroy_stock');
    }

    /**
     * Xuất hàng trả lại
     */
    public function exportStock()
    {
        return view('backend.bill.export_stock');
    }

    /**
     * Nhập hàng trả lại
     */
    public function importStock()
    {
        return view('backend.bill.import_stock');
    }

    /**
     * Bảng cân đối hàng tồn
     */
    public function symmetrical()
    {
        return view('backend.bill.symmetrical');
    }

    public function stockRequisition()
    {
        return view('backend.bill.warehouse.stock_requisition');
    }

    public function createStockRequisition()
    {
        return view('backend.bill.warehouse.create_stock_requisition');
    }
}
