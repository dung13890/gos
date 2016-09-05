<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Users\UpdateRequest;
use App\Http\Requests\Backend\Users\ChangePasswordRequest;
use App\Model\User;
use App\Model\Position;
use App\Model\Room;
use App\Model\Permission;
use App\Model\Role;

class UsersController extends Controller
{
    protected $dataSelect = ['id', 'code', 'fullname', 'username', 'email', 'phone'];

    public function index()
    {
         try {
            $users = User::select($this->dataSelect)->orderBy('id', 'desc')->get();
            return response()->json([
                'code' => 200,
                'message' => 'Load thành công',
                'users' => $users,
                'positions' => Position::select(['id', 'name'])->orderBy('id', 'desc')->get(),
                'rooms' => Room::select(['id', 'name'])->orderBy('id', 'desc')->get(),
                'permissions' => Permission::select(['id', 'name'])->orderBy('id', 'desc')->get(),
                'roles' => Role::select(['id', 'name'])->orderBy('id', 'desc')->get(),
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
            $params['code'] = strtoupper(str_random(6));

            $user = User::create($params);

            if (isset($params['rooms_selected']) && $params['rooms_selected'] != null) {
                $roomIds = array_pluck($params['rooms_selected'], 'id');
                $user->rooms()->attach($roomIds);
            }

            if (isset($params['permissions_selected']) && $params['permissions_selected'] != null) {
                $permissionIds = array_pluck($params['permissions_selected'], 'id');
                $user->permissions()->attach($permissionIds);
            }

            if (isset($params['roles_selected']) && $params['roles_selected'] != null) {
                $rolesIds = array_pluck($params['roles_selected'], 'id');
                $user->roles()->attach($rolesIds);
            }

            return response()->json([
                'code' => 200,
                'message' => 'Thêm thành công!',
                'user' => $user,
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
            $user = User::findOrFail($id);
            $user->rooms = $user->rooms()->get(['id', 'name']);
            $user->permissions = $user->permissions()->get(['permissions.id', 'permissions.name']);
            $user->roles = $user->roles()->get(['id', 'name']);
            
            return response()->json([
                'code' => 200,
                'message' => 'Load thành công',
                'user' => $user,
            ]);
        }

        catch(Exception $e) {
            return response()->json([
                'success' => false,
                'errors'  => $e->getMessage(),
            ], 500);
        }
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $params = $request->all();
            $user = User::findOrFail($id);
            $user->update($params);

            if (isset($params['rooms_selected']) && $params['rooms_selected'] != null) {
                $roomIds = array_pluck($params['rooms_selected'], 'id');
                $user->rooms()->sync($roomIds);
            }

            if (isset($params['permissions_selected']) && $params['permissions_selected'] != null) {
                $permissionIds = array_pluck($params['permissions_selected'], 'id');
                $user->permissions()->sync($permissionIds);
            }

            if (isset($params['roles_selected']) && $params['roles_selected'] != null) {
                $rolesIds = array_pluck($params['roles_selected'], 'id');
                $user->roles()->sync($rolesIds);
            }

            return response()->json([
                'code' => 200,
                'message' => 'Sửa thành công!',
                'user' => $user,
            ]);
        }

        catch(Exception $e) {
            return response()->json([
                'success' => false,
                'errors'  => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            User::findOrFail($id)->delete();

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

    public function changePassword(ChangePasswordRequest $request)
    {
        $data = $request->only(
            'old_password',
            'password',
            'password_confirmation'
        );
        
        $entity = \Auth::user();
    }
}
