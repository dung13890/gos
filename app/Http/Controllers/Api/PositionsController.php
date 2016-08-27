<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Positions\StoreRequest;
use App\Model\Position;

class PositionsController extends Controller
{
    public function index()
    {
        return response()->json([
            'positions' => Position::all()
        ]);
    }

    public function store(StoreRequest $request)
    {
        $position = Position::create($request->all());
        
        return response()->json([
            'code' => 200,
            'message' => 'Thêm thành công!',
            'position' => $position,
        ]);
    }

    public function edit($id)
    {
        return response()->json([
            'code' => 200,
            'message' => 'Đã lấy được thông tin!',
            'position' => Position::findOrFail($id),
        ]);
    }
}
