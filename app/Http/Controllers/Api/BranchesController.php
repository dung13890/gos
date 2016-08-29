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
        $params = $request->all();
        $locationIds = [];
        
        $branch = Branch::create($params);

        if (isset($params['locations_selected']) && $params['locations_selected'] != null) {
            $locationIds = array_pluck($params['locations_selected'], 'id');
            $branch->locations()->attach($locationIds);
        }

        return response()->json([
            'code' => 200,
            'message' => 'Thêm thành công!',
            'branch' => $branch,
        ]);
    }

    public function edit($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->locations = $branch->locations()->get(['id', 'name']);

        return response()->json([
            'code' => 200,
            'message' => 'Đã lấy được thông tin!',
            'branch' => $branch,
        ]);
    }

    public function update(Request $request, $id)
    {
        $params = $request->all();
        $locationIds = [];

        $branch = Branch::findOrFail($id);
        $branch->update($params);

        if (isset($params['locations_selected']) && $params['locations_selected'] != null) {
            $locationIds = array_pluck($params['locations_selected'], 'id');
            $branch->locations()->sync($locationIds);
        }

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
