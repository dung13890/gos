<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContractsController extends Controller
{
    public function index()
    {
        return view('backend.contract.index');
    }

    public function create()
    {
    	return view('backend.contract.create');
    }
}
