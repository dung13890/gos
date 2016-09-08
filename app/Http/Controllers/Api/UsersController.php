<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Users\UpdateRequest;
use App\Http\Requests\Backend\Users\ChangePasswordRequest;
use App\Contracts\Repositories\UserRepository;
use App\Model\User;
use App\Model\Position;
use App\Model\Room;
use App\Model\Permission;
use App\Model\Role;
use Illuminate\Support\Str;

class UsersController extends ApiController
{
    protected $dataSelect = ['id', 'code', 'fullname', 'username', 'email', 'phone'];

    protected $roleSelect = ['id', 'name'];

    protected $roomSelect = ['id', 'name'];

    protected $positionSelect = ['id', 'name'];

    protected $permissionSelect = ['id', 'name'];

    public function __construct(UserRepository $user)
    {
        parent::__construct($user);
    }

    public function getData(Request $request)
    {
        return \Datatables::of($this->repository->datatables($this->dataSelect, ['rooms', 'position']))
        ->addColumn('rooms', function ($item) {
            return $item->rooms->map(function ($room) {
                return '<span class="label label-primary">' . $room->name . '</span>';
            })->implode(' ');
        })
        ->addColumn('position', function ($item) {
            return ($item->position) ? $item->position->name : null;
        })
        ->filter(function ($instance) use ($request) {
            if ($request->has('code')) {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['code'], $request->code) ? true : false;
                });
            }

            if ($request->has('fullname')) {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['fullname'], $request->fullname) ? true : false;
                });
            }

            if ($request->has('email')) {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['email'], $request->email) ? true : false;
                });
            }

            if ($request->has('phone')) {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['phone'], $request->phone) ? true : false;
                });
            }

            if ($request->has('username')) {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['username'], $request->username) ? true : false;
                });
            }

            if ($request->has('position_id')) {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return $row->position_id === $request->position_id;
                });
            }

            if ($request->has('room_id')) {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return isset($row->rooms->keyBy('id')[$request->room_id]) ? true : false ;
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
        parent::index();
        try {
            $this->compacts['roles'] = app(Role::class)->get($this->roleSelect);
            $this->compacts['positions'] = app(Position::class)->get($this->positionSelect);
            $this->compacts['rooms'] = app(Room::class)->get($this->roomSelect);
            $this->compacts['permissions'] = app(Permission::class)->get($this->permissionSelect);
            $code = 200;
        } catch (\Exception $e) {
            $code = 500;
            $this->compacts['errors'] = $e->getMessage();
        }

        return $this->jsonRender();
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
