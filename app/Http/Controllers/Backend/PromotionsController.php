<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PromotionsController extends Controller
{
    public function index()
    {
        return view('backend.promotion.index');
    }

    public function create()
    {
        return view('backend.promotion.create');
    }
}
