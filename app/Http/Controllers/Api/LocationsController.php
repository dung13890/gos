<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Model\Location;
use App\Contracts\Services\LocationService;
use App\Contracts\Repositories\LocationRepository;
use App\Http\Requests\Backend\Location\StoreRequest;
use App\Http\Requests\Backend\Location\UpdateRequest;


class LocationsController extends ApiController
{
    protected $dataSelect = ['id', 'code', 'name', 'description'];

    public function __construct(LocationRepository $location)
    {
        parent::__construct($location);
    }

    public function getData(Request $request)
    {
        return \Datatables::of(app(Location::class)->all($this->dataSelect))
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

    public function store(StoreRequest $request, LocationService $service)
    {
        $data = $request->all();

        return $this->storeData($data, $service);
    }

    public function edit($id)
    {
        parent::edit($id);

        $this->compacts['branch_ids'] = $this->compacts['item']->branches->toArray();

        return $this->jsonRender(200);
    }

    public function update(UpdateRequest $request, LocationService $service,  $id)
    {
        $data = $request->all();
        $entity = $this->repository->findOrFail($id);

        return $this->updateData($data, $service, $entity);
    }

    public function destroy(LocationService $service, $id)
    {
        $entity = $this->repository->findOrFail($id);

        return $this->deleteData($service, $entity);
    }
}
