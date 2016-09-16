<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Contracts\Repositories\WarehouseRepository;
use App\Contracts\Services\WarehouseService;
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

            ->addColumn('actions', function ($item) {

                $actions = '';
                    if ($this->before('edit', $item, false)) {
                        $actions .=  'Edit';
                    }

                    if ($this->before('delete', $item, false)) {
                        $actions .= 'Delete';
                    }

                return $actions;
            })

            ->make(true);
    }
}
