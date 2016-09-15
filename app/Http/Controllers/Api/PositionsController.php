<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests\Backend\Positions\StoreRequest;
use App\Http\Requests\Backend\Positions\UpdateRequest;
use App\Contracts\Repositories\PositionRepository;
use App\Contracts\Services\PositionService;
use Illuminate\Support\Str;

class PositionsController extends ApiController
{
    protected $dataSelect = ['id', 'name', 'code', 'created_at'];

    public function __construct(PositionRepository $position)
    {
        parent::__construct($position);
    }

    public function getData(Request $request)
    {
        return \Datatables::of($this->repository->datatables($this->dataSelect))
        ->filter(function ($instance) use ($request) {
            if ($request->has('code')) {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['code'], $request->code) ? true : false;
                });
            }

            if ($request->has('name')) {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['name'], $request->name) ? true : false;
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

    public function store(StoreRequest $request, PositionService $service)
    {
        $data = $request->only(['code', 'name']);

        return $this->storeData($data, $service);
    }

    public function edit($id)
    {
        parent::edit($id);

        return $this->jsonRender(200);
    }

    public function update(UpdateRequest $request, PositionService $service,  $id)
    {
        $data = $request->only(['code', 'name']);
        $entity = $this->repository->findOrFail($id);

        return $this->updateData($data, $service, $entity);
    }

    public function destroy($id, PositionService $service)
    {
        $entity = $this->repository->findOrFail($id);

        return $this->deleteData($service, $entity);
    }
}
