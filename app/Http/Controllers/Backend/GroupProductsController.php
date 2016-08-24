<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GroupProductsController extends Controller
{
    public function index()
    {
    	return view('backend.groupproduct.index');
    }
}
