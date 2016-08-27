<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Unit;

class UnitsController extends Controller
{
    public function index()
    {
        return response()->json([
            'code' => 200,
            'message' => 'Load thành công',
            'units' => Unit::select(['id', 'name', 'short_name', 'description'])->orderBy('id', 'desc')->get()
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

    public function update(UpdateRequest $request, $id)
    {
        $position = Position::findOrFail($id);
        $position->update($request->all());

        return response()->json([
            'code' => 200,
            'message' => 'Sửa thành công!',
            'position' => $position,
        ]);
    }

    public function destroy($id)
    {
        Position::findOrFail($id)->delete();
        return response()->json([
            'code' => 200,
            'message' => 'Xóa thành công!',
        ]);
    }
}
