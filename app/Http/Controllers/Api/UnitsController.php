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
    
    public function store(StoreRequest $request)
    {
        $unit = Unit::create($request->all());
        
        return response()->json([
            'code' => 200,
            'message' => 'Thêm thành công!',
            'unit' => $unit,
        ]);
    }

    public function edit($id)
    {
        return response()->json([
            'code' => 200,
            'message' => 'Đã lấy được thông tin!',
            'unit' => Unit::findOrFail($id),
        ]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $unit = Unit::findOrFail($id);
        $unit->update($request->all());

        return response()->json([
            'code' => 200,
            'message' => 'Sửa thành công!',
            'unit' => $unit,
        ]);
    }

    public function destroy($id, UnitService $service)
    {
        $entity = $this->repository->findOrFail($id);

        return $this->deleteData($service, $entity);
    }
}
