<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests\Backend\Branches\StoreRequest;
use App\Http\Requests\Backend\Branches\UpdateRequest;
use App\Contracts\Repositories\BranchRepository;
use App\Contracts\Repositories\LocationRepository;
use App\Contracts\Services\BranchService;
use Illuminate\Support\Str;

class BranchesController extends ApiController
{
    protected $dataSelect = ['id', 'code', 'name', 'address', 'status'];

    protected $locationSelect = ['id', 'name'];

    protected $locationRepository;

    public function __construct(BranchRepository $branch, LocationRepository $location)
    {
        parent::__construct($branch);
        $this->locationRepository = $location;
    }

    public function index(Request $request)
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

            if ($request->has('address')) {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['name'], $request->name) ? true : false;
                });
            }
        })
        ->editColumn('status', function ($item) {
            return "<span class='label " . config("gso.statusBranch.{$item->status}.label") . "'>" . config("gso.statusBranch.{$item->status}.name") ."</span>";
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

    public function create()
    {
        try {
            $this->compacts['locations'] = $this->locationRepository->all($this->locationSelect);
            $code = 200;
        } catch (\Exception $e) {
            $code = 500;
            $this->compacts['errors'] = $e->getMessage();
        }

        return $this->jsonRender();
    }

    public function store(StoreRequest $request, BranchService $service)
    {
        $data = $request->all();

        return $this->storeData($data, $service);
    }

    public function edit($id)
    {
        parent::edit($id);
        $this->compacts['item']->load('locations');

        return $this->jsonRender(200);
    }

    public function update(UpdateRequest $request, BranchService $service, $id)
    {
        $data = $request->all();
        $entity = $this->repository->findOrFail($id);

        return $this->updateData($data, $service, $entity);
    }

    public function destroy($id, BranchService $service)
    {
        $entity = $this->repository->findOrFail($id);

        return $this->deleteData($service, $entity);
    }
}
