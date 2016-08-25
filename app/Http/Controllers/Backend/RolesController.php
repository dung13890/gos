<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\RoleRequest;
use App\Model\Role;
use App\Model\Permission;

class RolesController extends BackendController
{
    protected $dataSelect = ['name', 'description'];

    public function __construct(Role $role)
    {
        parent::__construct($role);
    }

    public function ajaxPermission()
    {
        return app(Permission::class)->all()->chunk(2);
    }

    public function ajaxRole($id)
    {
        return $this->repository->findOrFail($id)->load('perms');
    }

    public function index()
    {
        parent::index();
        $this->compacts['items'] = $this->repository->orderby('id', 'DESC')->paginate(10);
        
        return $this->viewRender();
    }

    public function store(RoleRequest $request)
    {
        $data = $request->all();
        $role = $this->repository->create($data);
        $role->perms()->sync(explode(',' ,$request->perms));
        $this->e['message'] = $this->trans('object_created_successfully');

        return $this->e;
    }

    public function ajaxUpdate(RoleRequest $request, $id)
    {
        $data = $request->all();
        $role = $this->repository->findOrFail($id);
        $role->update($data);
        $role->perms()->sync(explode(',' ,$request->perms));
        $this->e['message'] = $this->trans('object_updated_successfully');

        return $this->e;
    }

    public function destroy($id)
    {
        $entity = $this->repository->findOrFail($id);
        try {
            $entity->forceDelete();
            $this->e['message'] = $this->trans('object_deleted_successfully');
        } catch (\Exception $e) {
            $this->e['code'] = 100;
            $this->e['message'] = $this->trans('object_deleted_unsuccessfully');
        }

        return session()->flash('flash_message', json_encode($this->e, true));
    }

}
