<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\RoomRequest;
use App\Contracts\Services\RoomService;

class RoomsController extends Controller
{
    public function index()
    {
        return view('backend.room.index');
    }

    public function store(RoomRequest $request, RoomService $service)
    {
        $this->before(__FUNCTION__);
        return $this->storeData($request->all(), $service);
    }
}
