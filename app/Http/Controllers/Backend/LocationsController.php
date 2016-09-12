<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Contracts\Repositories\LocationRepository;

class LocationsController extends BackendController
{
    protected $dataSelect = ['id', 'code', 'name', 'description'];

    public function __construct(LocationRepository $location)
    {
        parent::__construct($location);
    }

    public function index()
    {
        parent::index();
        return $this->viewRender();
    }
}
