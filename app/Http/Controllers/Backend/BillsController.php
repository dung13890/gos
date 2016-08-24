<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BillsController extends Controller
{
    /**
     * Hóa đơn bán hàng
     */
    public function sale()
    {
        return view('backend.bill.sale');
    }
}
