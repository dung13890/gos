<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Contracts\Repositories\UnitRepository;
use App\Contracts\Services\UnitService;
use App\Http\Requests\Backend\Units\StoreRequest;
use App\Http\Requests\Backend\Units\UpdateRequest;
use Illuminate\Support\Str;

class UnitsController extends ApiController
{
    protected $dataSelect = ['id', 'name', 'short_name', 'description'];

    public function __construct(UnitRepository $unit)
    {
        parent::__construct($unit);
    }

    public function index(Request $request)
    {
        return \Datatables::of($this->repository->datatables($this->dataSelect))
        ->filter(function ($instance) use ($request) {
            if ($request->has('name')) {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['name'], $request->name);
                });
            }

            if ($request->has('short_name')) {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['short_name'], $request->short_name);
                });
            }

            if ($request->has('description')) {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['description'], $request->description);
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

    public function store(StoreRequest $request, UnitService $service)
    {
        $data = $request->all();

        return $this->storeData($data, $service);
    }

    public function edit($id)
    {
        parent::edit($id);

        return $this->jsonRender(200);
    }

    public function update(UpdateRequest $request, UnitService $service,  $id)
    {
        $data = $request->only('name', 'short_name', 'description');
        $entity = $this->repository->findOrFail($id);

        return $this->updateData($data, $service, $entity);
    }

    public function destroy($id, UnitService $service)
    {
        $entity = $this->repository->findOrFail($id);

        return $this->deleteData($service, $entity);
    }
}
