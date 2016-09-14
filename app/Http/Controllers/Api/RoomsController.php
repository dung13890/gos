<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests\Backend\Rooms\StoreRequest;
use App\Http\Requests\Backend\Rooms\UpdateRequest;
use App\Contracts\Repositories\RoomRepository;
use App\Contracts\Repositories\BranchRepository;
use App\Contracts\Services\RoomService;
use Illuminate\Support\Str;
use App\Model\Permission;

class RoomsController extends ApiController
{
    protected $dataSelect = ['id', 'code', 'name', 'manager', 'member', 'founding'];

    protected $permissionSelect = ['id', 'name'];

    protected $branchSelect = ['id', 'name'];

    protected $branchRepository;

    public function __construct(RoomRepository $room, BranchRepository $branch)
    {
        parent::__construct($room);
        $this->branchRepository = $branch;
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

            if ($request->has('manager')) {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['manager'], $request->manager) ? true : false;
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
        try {
            $this->compacts['permissions'] = app(Permission::class)->get($this->permissionSelect);
            $this->compacts['branches'] = $this->branchRepository->all($this->branchSelect);
            $code = 200;
        } catch (\Exception $e) {
            $code = 500;
            $this->compacts['errors'] = $e->getMessage();
        }

        return $this->jsonRender();
    }

    public function store(StoreRequest $request, RoomService $service)
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

    public function update(UpdateRequest $request, RoomService $service, $id)
    {
        $data = $request->all();
        $entity = $this->repository->findOrFail($id);

        return $this->updateData($data, $service, $entity);
    }

    public function destroy($id, RoomService $service)
    {
        $entity = $this->repository->findOrFail($id);

        return $this->deleteData($service, $entity);
    }
}
