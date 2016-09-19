<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Contracts\Repositories\WarehouseRepository;
use App\Contracts\Services\WarehouseService;
use App\Http\Requests\Backend\Warehouses\StoreRequest;
use App\Http\Requests\Backend\Warehouses\UpdateRequest;
use App\Model\Branch;

class WarehousesController extends ApiController
{
    protected $dataSelect = ['id', 'code', 'name', 'user_id', 'branch_id'];
    protected $branchSelect = ['id', 'name'];

    public function __construct(WarehouseRepository $warehouse)
    {
        parent::__construct($warehouse);
    }

    public function startController()
    {
        try {
            $this->compacts['branches'] = app(Branch::class)->get($this->branchSelect);
            $code = 200;
        } catch (\Exception $e) {
            $code = 500;
            $this->compacts['errors'] = $e->getMessage();
        }

        return $this->jsonRender();
    }

    public function index(Request $request)
    {
        return \Datatables::of($this->repository->datatables($this->dataSelect, ['user']))

            ->filter(function ($instance) use ($request) {

                if ($request->has('code')) {
                    $instance->collection = $instance->collection->filter(function ($warehouse) use ($request) {
                        return Str::contains($warehouse['code'], $request->code);
                    });
                }

                if ($request->has('name')) {
                    $instance->collection = $instance->collection->filter(function ($warehouse) use ($request) {
                        return Str::contains($warehouse['name'], $request->name);
                    });
                }

                if ($request->has('user')) {
                    $instance->collection = $instance->collection->filter(function ($warehouse) use ($request) {
                        return Str::contains($warehouse->user->fullname, $request->user);
                    });
                }

                if ($request->has('branch')) {
                    $instance->collection = $instance->collection->filter(function ($warehouse) use ($request) {
                        return $warehouse->branch->id == $request->branch;
                    });
                }
            })

            ->addColumn('user', function ($warehouse) {
                return ($warehouse->user_id) ? $warehouse->user->fullname : null;
            })

            ->addColumn('branch', function ($warehouse) {
                return ($warehouse->branch_id) ? $warehouse->branch->name : null;
            })

            ->addColumn('actions', function ($warehouse) {
                $actions = '';
                if ($this->before('edit', $warehouse, false)) {
                    $actions .= '<a href="#newProvider" 
                        class="btn btn-xs btn-primary edit-entity"
                        id="'. $warehouse->id .'"
                        name="'. $warehouse->name .'"
                        data-toggle="modal"
                    ><i class="glyphicon glyphicon-edit"></i> Sửa</a>';
                }

                if ($this->before('delete', $warehouse, false)) {
                    $actions .= '<a href="#" 
                        class="btn btn-xs btn-danger destroy-entity"
                        id="'. $warehouse->id .'"
                        name="'. $warehouse->name .'"
                    ><i class="glyphicon glyphicon-remove"></i> Xóa</a>';
                }

                return $actions;
            })

            ->make(true);
    }

    public function store(StoreRequest $request, WarehouseService $service)
    {
        $data = $request->all();

        return $this->storeData($data, $service);
    }

    public function edit($id)
    {
        parent::edit($id);
        return $this->jsonRender(200);
    }

    public function update(UpdateRequest $request, WarehouseService $service, $id)
    {
        $data = $request->all();
        $warehouse = $this->repository->findOrFail($id);
        return $this->updateData($data, $service, $warehouse);
    }
    
    public function destroy($id, WarehouseService $warehouse)
    {
        return $this->deleteData($warehouse, $this->repository->findOrFail($id));
    }
}
