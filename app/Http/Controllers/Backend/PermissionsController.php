<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PermissionsController extends Controller
{
    public function index()
    {
        return view('backend.permission.index');
    }
}
