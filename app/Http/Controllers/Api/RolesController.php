<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Backend\Roles\StoreRequest;
use App\Http\Requests\Backend\Roles\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Contracts\Services\RoleService;
use App\Model\Role;
use App\Model\Permission;
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
        $this->compacts['permissions'] = app(Permission::class)->all();

        return $this->jsonRender(200);
    }

    public function store(StoreRequest $request, RoleService $service)
    {
        $data = $request->all();

        return $this->storeData($data, $service);
    }

    public function edit($id)
    {
        parent::edit($id);
        $this->compacts['item']->load('permissions');

        return $this->jsonRender(200);
    }

    public function update(UpdateRequest $request, RoleService $service,  $id)
    {
        $data = $request->all();
        $entity = $this->repository->findOrFail($id);

        return $this->updateData($data, $service, $entity);
    }

    public function destroy($id, RoleService $service)
    {
        $entity = $this->repository->findOrFail($id);

        return $this->deleteData($service, $entity);
    }
}
