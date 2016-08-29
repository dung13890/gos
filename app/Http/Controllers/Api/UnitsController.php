<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Unit;
use App\Http\Requests\Backend\Units\StoreRequest;
use App\Http\Requests\Backend\Units\UpdateRequest;

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
        $unit = Unit::create($request->all());
        
        return response()->json([
            'code' => 200,
            'message' => 'Thêm thành công!',
            'unit' => $unit,
        ]);
    }

    public function edit($id)
    {
        return response()->json([
            'code' => 200,
            'message' => 'Đã lấy được thông tin!',
            'unit' => Unit::findOrFail($id),
        ]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $unit = Unit::findOrFail($id);
        $unit->update($request->all());

        return response()->json([
            'code' => 200,
            'message' => 'Sửa thành công!',
            'unit' => $unit,
        ]);
    }

    public function destroy($id)
    {
        Unit::findOrFail($id)->delete();
        return response()->json([
            'code' => 200,
            'message' => 'Xóa thành công!',
        ]);
    }
}
