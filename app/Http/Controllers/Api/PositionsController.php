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

    public function store(StoreRequest $request)
    {
        try {
            $position = Position::create($request->all());
            
            return response()->json([
                'code' => 200,
                'message' => 'Thêm thành công!',
                'position' => $position,
            ]);
        }
        
        catch(Exception $e) {
            return response()->json([
                'errors' => true,
                'messages'  => $e->getMessage(),
            ], 500);
        }
    }

    public function edit($id)
    {
        return response()->json([
            'code' => 200,
            'message' => 'Đã lấy được thông tin!',
            'position' => Position::findOrFail($id),
        ]);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $position = Position::findOrFail($id);
            $position->update($request->all());

            return response()->json([
                'code' => 200,
                'message' => 'Sửa thành công!',
                'position' => $position,
            ]);
        }

        catch(Exception $e) {
            return response()->json([
                'errors' => true,
                'messages'  => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id, PositionService $service)
    {
        $entity = $this->repository->findOrFail($id);

        return $this->deleteData($service, $entity);
    }
}
