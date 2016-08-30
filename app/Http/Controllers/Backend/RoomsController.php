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
}
