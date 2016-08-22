<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\RoomRequest;
use App\Contracts\Services\RoomService;
use App\Contracts\repositories\RoomRepository;
use App\Model\Branch;

class RoomsController extends BackendController
{
    protected $dataSelect = ['id', 'code', 'name', 'manager', 'member', 'founding'];

    public function __construct(RoomRepository $room)
    {
        parent::__construct($room);
    }

    public function index()
    {
        parent::index();

        $this->compacts['branches'] = app(Branch::class)->all(['id', 'name']);
        return $this->viewRender([], 'room.index');
    }

    public function store(RoomRequest $request, RoomService $service)
    {
        $this->before(__FUNCTION__);
        return $this->storeData($request->all(), $service);
    }

    public function getData($items = null)
    {
        $data = $items ? $items : $this->repository->datatables($this->dataSelect);

        return \Datatables::of($data)->addColumn('actions', function ($item) {
                $actions = [];

                if ($this->before('show', $item, false)) {
                    $actions['show'] = [
                        'uri' => route('rooms.show', $item->id),
                        'label' => $this->trans('show'),
                    ];
                }

                if ($this->before('edit', $item, false)) {
                    $actions['edit'] = [
                        'uri' => route('rooms.edit', $item->id),
                        'label' => $this->trans('edit'),
                    ];
                }

                if ($this->before('delete', $item, false)) {
                    $actions['delete'] = [
                        'uri' => route('rooms.destroy', $item->id),
                        'label' => $this->trans('delete'),
                    ];
                }

            return $actions;

        })->make(true);
    }

    public function edit($id)
    {
        $room = \App\Model\Room::find($id);
        
        return response()->json([
            'room' => $room
        ]);
    }

    public function show($id)
    {

    }

    public function destroy(RoomService $service, $id)
    {
        $entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);
        return $this->deleteData($service, $entity);
    }
}
