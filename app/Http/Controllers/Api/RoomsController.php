<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Rooms\StoreRequest;
use App\Http\Requests\Backend\Rooms\UpdateRequest;
use App\Model\Room;
use App\Model\Branch;

class RoomsController extends Controller
{
    protected $dataSelect = ['id', 'code', 'name', 'manager', 'member', 'founding'];

    public function index()
    {
        return response()->json([
            'code' => 200,
            'message' => 'Load thành công',
            'rooms' => Room::select($this->dataSelect)->orderBy('id', 'desc')->get(),
            'branches' => Branch::select(['id', 'name'])->get(),
        ]);
    }

    public function store(StoreRequest $request)
    {
        $params = $request->all();
        $room = Room::create($params);
        
        return response()->json([
            'code' => 200,
            'message' => 'Thêm thành công!',
            'room' => $room,
        ]);
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return response()->json([
            'code' => 200,
            'message' => 'Thành công!',
            'room' => $room,
        ]);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $room = Room::findOrFail($id);
            $room->update($request->all());

            return response()->json([
                'code' => 200,
                'message' => 'Sửa thành công!',
                'room' => $room,
            ]);
        }
        
        catch(Exception $e) {
            return response()->json([
                'success' => false,
                'errors'  => $e->getMessage(),
            ], 300);
        }
    }

    public function destroy($id)
    {
        Room::findOrFail($id)->delete();
        return response()->json([
            'code' => 200,
            'message' => 'Xóa thành công!',
        ]);
    }
}
