<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CustomerGroupsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->type == config('gso.customer_group.type_sup')) {
        	$titlePage = 'Quản lý nhóm nhà cung cấp';
        	$type = config('gso.customer_group.type_sup');
        } else {
        	$titlePage = 'Quản lý nhóm khách hàng';
        	$type = config('gso.customer_group.type_cus');
        }
        
        return view('backend.customergroup.index', compact('type', 'titlePage'));
    }
}
