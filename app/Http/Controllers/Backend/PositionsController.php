<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Positions\StoreRequest;

class PositionsController extends Controller
{
    public function index()
    {
        return view('backend.position.index');
    }

    public function store(StoreRequest $request)
    {
        
    }
}
