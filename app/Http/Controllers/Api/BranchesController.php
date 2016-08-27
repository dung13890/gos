<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Branches\StoreRequest;
use App\Model\Branch;
use App\Model\Location;

class BranchesController extends Controller
{
    public function index()
    {
        return response()->json([
            'code' => 200,
            'message' => 'Load thành công',
            'branches' => Branch::select(['id', 'code', 'name', 'address', 'status', 'created_at'])->orderBy('id', 'desc')->get(),
            'locations' => Location::select(['id', 'name'])->get(),
        ]);
    }

    public function store(StoreRequest $request)
    {
        $branch = Branch::create($request->all());

        return response()->json([
            'code' => 200,
            'message' => 'Thêm thành công!',
            'branch' => $branch,
        ]);
    }

    public function edit($id)
    {
        return response()->json([
            'code' => 200,
            'message' => 'Đã lấy được thông tin!',
            'branch' => Branch::findOrFail($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $branch = Branch::findOrFail($id);
        $branch->update($request->all());

        return response()->json([
            'code' => 200,
            'message' => 'Sửa thành công!',
            'branch' => $branch,
        ]);
    }

    public function destroy($id)
    {
        Branch::findOrFail($id)->delete();
        return response()->json([
            'code' => 200,
            'message' => 'Xóa thành công!',
        ]);
    }
}
