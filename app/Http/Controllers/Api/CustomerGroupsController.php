<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Contracts\Repositories\CustomerGroupRepository;
use App\Contracts\Services\CustomerGroupService;
use App\Http\Requests\Backend\CustomerGroups\StoreRequest;
use App\Http\Requests\Backend\CustomerGroups\UpdateRequest;

class CustomerGroupsController extends ApiController
{
    protected $dataSelect = ['id', 'code', 'name'];
    protected $type;

    public function __construct(Request $request, CustomerGroupRepository $customerGroup)
    {
        parent::__construct($customerGroup);
        $this->type = $request->type == config('gso.customer_group.type_sup') 
            ? $request->type : config('gso.customer_group.type_cus');
    }

    public function index(Request $request)
    {

        return \Datatables::of($this->repository->datatables($this->dataSelect, $this->type))

            ->filter(function ($instance) use ($request) {

                if ($request->has('code')) {
                    $instance->collection = $instance->collection->filter(function ($customerGroup) use ($request) {
                        return Str::contains($customerGroup['code'], $request->code);
                    });
                }

                if ($request->has('name')) {
                    $instance->collection = $instance->collection->filter(function ($customerGroup) use ($request) {
                        return Str::contains($customerGroup['name'], $request->name);
                    });
                }
            })

            ->addColumn('user', function ($customerGroup) {
                return ($customerGroup->user_id) ? $customerGroup->user->fullname : null;
            })

            ->addColumn('branch', function ($customerGroup) {
                return ($customerGroup->branch_id) ? $customerGroup->branch->name : null;
            })
            
            ->addColumn('actions', function ($customerGroup) {
                $actions = '';
                if ($this->before('edit', $customerGroup, false)) {
                    $actions .= '<a href="#newProvider" 
                        class="btn btn-xs btn-primary edit-entity"
                        id="'. $customerGroup->id .'"
                        name="'. $customerGroup->name .'"
                        data-toggle="modal"
                    ><i class="glyphicon glyphicon-edit"></i> Sửa</a>';
                }

                if ($this->before('delete', $customerGroup, false)) {
                    $actions .= '<a href="#" 
                        class="btn btn-xs btn-danger destroy-entity"
                        id="'. $customerGroup->id .'"
                        name="'. $customerGroup->name .'"
                    ><i class="glyphicon glyphicon-remove"></i> Xóa</a>';
                }

                return $actions;
            })

            ->make(true);
    }

    public function store(StoreRequest $request, CustomerGroupService $service)
    {
        return $this->storeData($request->all(), $service);
    }

    public function edit($id)
    {
        parent::edit($id);
        return $this->jsonRender(200);
    }

    public function update(UpdateRequest $request, CustomerGroupService $service, $id)
    {
        $data = $request->all();
        return $this->updateData($data, $service, $this->repository->findOrFail($id));
    }
    
    public function destroy($id, CustomerGroupService $customerGroup)
    {
        return $this->deleteData($customerGroup, $this->repository->findOrFail($id));
    }
}
