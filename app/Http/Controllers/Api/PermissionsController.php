<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use Exception;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Permission;
use Illuminate\Support\Str;

class PermissionsController extends Controller
{
	protected $dataSelect = ['id', 'name', 'slug', 'description', 'model'];

    public function index()
    {
        try {
            $permissions = Permission::select($this->dataSelect)->orderBy('id', 'desc')->get();
            return response()->json([
                'code' => 200,
                'message' => 'Load thành công',
                'permissions' => $permissions,
            ]);
         }

         catch(Exception $e) {
            return response()->json([
                'success' => false,
                'errors'  => $e->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $params = $request->all();
            $params['slug'] = Str::slug($params['name'], '-');
            $permission = Permission::create($params);

            return response()->json([
                'code' => 200,
                'message' => 'Thêm thành công!',
                'permission' => $permission,
            ]);
        }
        
        catch(Exception $e) {
            return response()->json([
                'success' => false,
                'errors'  => $e->getMessage(),
            ], 500);
        }

    }

    public function edit($id)
    {
        try {
            $permission = Permission::findOrFail($id);

            return response()->json([
                'code' => 200,
                'message' => 'Load thành công',
                'permission' => $permission,
            ]);
        }

        catch(Exception $e) {
            return response()->json([
                'success' => false,
                'errors'  => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $params = $request->all();
            $params['slug'] = Str::slug($params['name'], '-');
            $permission = Permission::findOrFail($id);
            $permission->update($params);

            return response()->json([
                'code' => 200,
                'message' => 'Sửa thành công!',
                'permission' => $permission,
            ]);
        }

        catch(Exception $e) {
            return response()->json([
                'errors' => true,
                'messages'  => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            Permission::findOrFail($id)->delete();

            return response()->json([
                'code' => 200,
                'message' => 'Xóa thành công!',
            ]);
        }

        catch(Exception $e) {
            return response()->json([
                'success' => false,
                'errors'  => $e->getMessage(),
            ], 500);
        }
    }
}
