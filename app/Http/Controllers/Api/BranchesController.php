<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests\Backend\Branches\StoreRequest;
use App\Contracts\Repositories\BranchRepository;
use App\Contracts\Services\BranchService;
use Illuminate\Support\Str;
use App\Model\Location;

class BranchesController extends ApiController
{
    protected $dataSelect = ['id', 'code', 'name', 'address', 'status'];

    public function __construct(BranchRepository $branch)
    {
        parent::__construct($branch);
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

    public function index()
    {

    }

    public function store(StoreRequest $request)
    {
        $params = $request->all();
        $locationIds = [];
        
        $branch = Branch::create($params);

        if (isset($params['locations_selected']) && $params['locations_selected'] != null) {
            $locationIds = array_pluck($params['locations_selected'], 'id');
            $branch->locations()->attach($locationIds);
        }

        return response()->json([
            'code' => 200,
            'message' => 'Thêm thành công!',
            'branch' => $branch,
        ]);
    }

    public function edit($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->locations = $branch->locations()->get(['id', 'name']);

        return response()->json([
            'code' => 200,
            'message' => 'Đã lấy được thông tin!',
            'branch' => $branch,
        ]);
    }

    public function update(Request $request, $id)
    {
        $params = $request->all();
        $locationIds = [];

        $branch = Branch::findOrFail($id);
        $branch->update($params);

        if (isset($params['locations_selected']) && $params['locations_selected'] != null) {
            $locationIds = array_pluck($params['locations_selected'], 'id');
            $branch->locations()->sync($locationIds);
        }

        return response()->json([
            'code' => 200,
            'message' => 'Sửa thành công!',
            'branch' => $branch,
        ]);
    }

    public function destroy($id, BranchService $service)
    {
        $entity = $this->repository->findOrFail($id);

        return $this->deleteData($service, $entity);
    }
}
