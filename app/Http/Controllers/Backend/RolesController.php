<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    public function index()
    {
        \App::setLocale('vi');
        
        return view('backend.role.index');
    }
}
