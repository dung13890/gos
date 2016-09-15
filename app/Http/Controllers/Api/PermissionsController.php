<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use Exception;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contracts\Services\PermissionService;
use App\Http\Requests\Backend\Permissions\StoreRequest;
use App\Http\Requests\Backend\Permissions\UpdateRequest;
use App\Model\Permission;
use Illuminate\Support\Str;

class PermissionsController extends ApiController
{
	protected $dataSelect = ['id', 'name', 'slug', 'description', 'model'];

    public function __construct(Permission $permission)
    {
        parent::__construct($permission);
    }

    public function getData(Request $request)
    {
        return \Datatables::of(app(Permission::class)->all($this->dataSelect))
        ->filter(function ($instance) use ($request) {
            if ($request->has('name')) {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['name'], $request->name) ? true : false;
                });
            }

            if ($request->has('slug')) {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['slug'], $request->slug) ? true : false;
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

    public function store(StoreRequest $request, PermissionService $service)
    {
        $data = $request->all();

        return $this->storeData($data, $service);
    }

    public function edit($id)
    {
        parent::edit($id);

        return $this->jsonRender(200);
    }

    public function update(UpdateRequest $request, PermissionService $service,  $id)
    {
        $data = $request->all();
        $entity = $this->repository->findOrFail($id);

        return $this->updateData($data, $service, $entity);
    }

    public function destroy($id, PermissionService $service)
    {
        $entity = $this->repository->findOrFail($id);

        return $this->deleteData($service, $entity);
    }
}
