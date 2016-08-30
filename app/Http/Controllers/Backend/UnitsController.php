<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\UnitRepository;
use App\Contracts\Services\UnitService;

class UnitsController extends BackendController
{
    protected $dataSelect = ['id', 'name', 'short_name', 'description'];

    public function __construct(UnitRepository $unit)
    {
        parent::__construct($unit);
    }
    
    public function index()
    {
        parent::index();
        return $this->viewRender();
    }
}
