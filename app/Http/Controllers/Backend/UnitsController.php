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

    public function getData($items = null)
    {
    	$data = $items ? $items : $this->repository->datatables($this->dataSelect);
        return \Datatables::of($data)
        	->addColumn('actions', function ($item) {
            	$actions = [];

                if ($this->before('show', $item, false)) {
                    $actions['show'] = [
                        'uri' => route($this->repositoryName . '.show', $item->id),
                        'label' => $this->trans('show'),
                    ];
                }

                if ($this->before('edit',$item, false)) {
                    $actions['edit'] = [
                        'uri' => route($this->repositoryName . '.edit', $item->id),
                        'label' => $this->trans('edit'),
                    ];
                }

                if ($this->before('delete', $item, false)) {
                    $actions['delete'] = [
                        'uri' => route($this->repositoryName . '.destroy', $item->id),
                        'label' => $this->trans('delete'),
                    ];
                }

            return $actions;

        })->make(true);
    }

    public function index()
    {
        parent::index();
    	return $this->viewRender();
    }
}
