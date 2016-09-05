<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Role;

class RolesController extends Controller
{
    protected $dataSelect = ['id', 'name', 'description'];

    public function index()
    {
        try {
            $roles = Role::select($this->dataSelect)->orderBy('id', 'desc')->get();
            return response()->json([
                'code' => 200,
                'message' => 'Load thành công',
                'roles' => $roles,
            ]);
         }
         
         catch(Exception $e) {
            return response()->json([
                'errors' => false,
                'messages'  => $e->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $params = $request->all();
            $role = Role::create($request->all($params));
            
            if (isset($params['permissions_checked']) && $params['permissions_checked'] != null) {
                $role->permissions()->attach($params['permissions_checked']);
            }

            return response()->json([
                'code' => 200,
                'message' => 'Thêm thành công!',
                'role' => $role,
            ]);
        }
        
        catch(Exception $e) {
            return response()->json([
                'errors' => true,
                'messages'  => $e->getMessage(),
            ], 500);
        }
    }

    public function edit($id)
    {
        try {
            $role = Role::findOrFail($id);
            $permissions = $role->permissions()->get(['permission_id'])->pluck('permission_id');

            return response()->json([
                'code' => 200,
                'message' => 'Đã lấy được thông tin!',
                'role' => $role,
                'permissions' => $permissions,
            ]);
        }

        catch(Exception $e) {
            return response()->json([
                'errors' => true,
                'messages'  => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $params = $request->all();
            $role = Role::findOrFail($id);
            $role->update($params);

            if (isset($params['permissions_checked']) && $params['permissions_checked'] != null) {
                $role->permissions()->sync($params['permissions_checked']);
            }

            return response()->json([
                'code' => 200,
                'message' => 'Sửa thành công!',
                'role' => $role,
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
            Role::findOrFail($id)->delete();

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
