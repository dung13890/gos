<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Role;
use Illuminate\Support\Str;

class RolesController extends ApiController
{
    protected $dataSelect = ['id', 'name', 'description'];

    public function __construct(Role $role)
    {
        parent::__construct($role);
    }

    public function getData(Request $request)
    {
        return \Datatables::of(app(Role::class)->all($this->dataSelect))
        ->filter(function ($instance) use ($request) {
            if ($request->has('name')) {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['name'], $request->name) ? true : false;
                });
            }

            if ($request->has('description')) {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['description'], $request->description) ? true : false;
                });
            }

        })
        ->addColumn('actions', function ($item) {
            $actions = [];
                if ($this->before('edit',$item, false)) {
                    $actions['edit'] = true;
                }
                if ($this->before('delete',$item, false)) {
                    $actions['delete'] = true;
                }

            return $actions;
        })->make(true);
    }

    public function index()
    {
        return;
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
